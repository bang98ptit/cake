<?php

namespace Inani\Larapoll\Helpers;

use Inani\Larapoll\Guest;
use Inani\Larapoll\Poll;
use Inani\Larapoll\Traits\PollWriterResults;
use Inani\Larapoll\Traits\PollWriterVoting;

class PollWriter
{
    use PollWriterResults,
        PollWriterVoting;

    /**
     * Draw a Poll
     *
     * @param Poll $poll
     * @return string
     */
    public function draw($poll)
    {
        if(is_int($poll)){
            $poll = Poll::findOrFail($poll);
        }

        if(!$poll instanceof Poll){
            throw new \InvalidArgumentException("The argument must be an integer or an instance of Poll");
        }

        if ($poll->isComingSoon()) {
            return 'To start soon';
        }

        if (!$poll->showResultsEnabled()) {
            return 'Thanks for voting';
        }


        $voter = $poll->canGuestVote() ? new Guest(request()) : auth(config('larapoll_config.admin_guard'))->user();

        if (is_null($voter) || $voter->hasVoted($poll->id) || $poll->isLocked()) {
            return $this->drawResult($poll);
        }

        if ($poll->isRadio()) {
            return $this->drawRadio($poll);
        }
        return $this->drawCheckbox($poll);
    }
    public function drawResult($id)
    {   
        $poll = Poll::find($id);
        $total = $poll->votes->count();
        $results = $poll->results()->grab();
        $options = collect($results)->map(function ($result) use ($total){
                return (object) [
                    'votes' => $result['votes'],
                    'percent' => $total === 0 ? 0 : ($result['votes'] / $total) * 100,
                    'name' => $result['option']->name
                ];
        });
        $question = $poll->question;
        echo view(config('larapoll_config.results') ? config('larapoll_config.results') : 'larapoll::stubs.results', compact('options', 'question'));
    }
}

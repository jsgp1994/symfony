<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends AbstractController
{

    /**
     * @Route("/comments/{id}/vote/{direction}",name="comment_vote", methods="POST")
     */

    public function commentVote($id, $direction, LoggerInterface $logger)
    {

        if ($direction === 'up') {
            $currentVoteCount = rand(7, 100);
            $logger->info('Voting up!');
        } else {
            $currentVoteCount = rand(0, 5);
            $logger->info('Voting down!');
        }

        return $this->json([
            'votes' => $currentVoteCount
        ]);

    }

}
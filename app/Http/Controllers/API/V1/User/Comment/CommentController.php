<?php

namespace App\Http\Controllers\API\V1\User\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\User\AddCommentRequest;
use App\Http\Requests\API\V1\User\ReplyCommentRequest;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends Controller
{
    public function add(AddCommentRequest $request)
    {
        $result_comment = CommentService::add($request);
        if ($result_comment) {

            return $this->handleSuccess($result_comment, config('story.message.create'));
        }
        return $this->handleError(config('story.message.fail_create'), [], Response::HTTP_NO_CONTENT);
    }

    public function reply(ReplyCommentRequest $request)
    {
       $result_reply  =   CommentService::reply($request);

       if ($result_reply) {

            return $this->handleSuccess($result_reply, config('story.message.create'));
        }
        return $this->handleError(config('story.message.fail_create'), [], Response::HTTP_NO_CONTENT);
    }
}

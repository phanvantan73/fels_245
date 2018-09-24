<?php
/**
 * Created by PhpStorm.
 * User: jakelagger
 * Date: 20/09/2018
 * Time: 11:43
 */

namespace App\Traits;


use App\Models\User;
use Carbon\Carbon;
use Exception;

trait CreateActivity
{
    public function createActivity(User $user, $action, $type, $attribute = null)
    {
        try {
            $time = Carbon::now();
            $content = '';
            switch ($type) {
                case trans('message.default.word') :
                    $content = trans('message.action.word', [
                        'action' => $action,
                        'word' => $attribute,
                        'time' => $time,
                    ]);
                    break;
                case trans('message.default.test') :
                    $content = trans('message.action.test', [
                        'action' => $action,
                        'time' => $time,
                    ]);
                    break;
                case trans('message.default.profile') :
                    $content = trans('message.action.update', [
                        'action' => $action,
                        'time' => $time,
                    ]);
                    break;
                case trans('message.default.follower') :
                    $content = trans('message.action.un_follow', [
                        'action' => $action,
                        'username' => $attribute,
                        'time' => $time,
                    ]);
                    break;
                case trans('message.default.avatar') :
                    $content = trans('message.action.change_avatar', [
                        'action' => $action,
                        'time' => $time,
                    ]);
            }

            $user->activities()->create([
                'action' => $action,
                'content' => $content,
                'time' => $time,
            ]);

            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: kilingzhang
 * Date: 2020-04-19
 * Time: 17:23
 */

namespace NeteaseCloudMusicApi\V1\Comment;


use NeteaseCloudMusicApi\Controller;
use Utils\Request;

/**
 * Class Music
 * @package NeteaseCloudMusicApi\V1\Comment
 *
 * 歌曲评论
 * 说明:调用此接口,传入音乐 id和 limit 参数, 可获得该音乐的所有评论(不需要登录)
 *
 *  必选参数:
 *  id: 音乐 id
 *
 *  可选参数:
 *  limit: 取出评论数量,默认为20
 *
 *  offset: 偏移数量,用于分页,如:(评论页数-1)*20, 其中 20 为 limit 的值
 *
 *  接口地址:
 *  /comment/music
 *
 *  调用例子:
 *  http://i.music.163.com/comment/music?id=186016&limit=1 对应晴天评论
 *
 */
class Music extends Controller
{
    protected $uri = 'https://music.163.com/api/v1/resource/comments/R_SO_4_{$id}';

    protected $params = [
        'id' => [
            'value' => null,
            'route' => 'id'
        ],
        'limit' => 20,
        'offset' => 0,
        'before' => [
            'value' => 0,
            'as' => 'beforeTime'
        ]
    ];

    protected function newRequest(Request $request): Request
    {
        return $request->setCookie('os', 'pc');
    }
}
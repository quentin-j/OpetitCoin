<?php

namespace OpetitCoin\CommentType;

class CommentType 
{   
    // meta ACF
    const COMMENT_TYPE_META_KEYS = [
        "score_confort",
        "score_equipment",
        "score_clean",
        "result"
    ];

    const COMMENT_TYPE_KEY = "comment";

    /**
     * register meta comments
     */
    static public function registerMetas()
    {
        if (static::COMMENT_TYPE_META_KEYS)
        {
            foreach(static::COMMENT_TYPE_META_KEYS as $comment_meta_key)
            register_meta(
                static::COMMENT_TYPE_KEY,
                $comment_meta_key,
                [
                    'show_in_rest' => true
                ]
                );
        }
    }

    static public function register_comment_field($comment_id) {
        // get new value
        $confort = get_field('score_confort');
        $proprete = get_field('score_clean');
        $equipment = get_field('score_equipment'); var_dump($equipment);
        // do something
        $score_global = $confort + $proprete + $equipment;
        print_r($score_global);
        $score_final = $score_global / 3;
        var_dump($score_final);
        $score = number_format($score_final,1);
        var_dump($score);
        update_field('result', $score, $comment_id );
    }
}
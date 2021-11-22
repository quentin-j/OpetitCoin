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

}
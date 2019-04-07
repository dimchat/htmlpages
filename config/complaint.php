<?php

return [
    'reasons'=>[
        '发布不适当内容对我造成骚扰'=>[
            'type'=>['individual'],
            'parent'=>'',
        ],
        '色情'=>[
            'type'=>['individual'],
            'parent'=>'发布不适当内容对我造成骚扰',
            'solutions'=>[
                'submit'
            ],
        ],
        '违法违禁品'=>[
            'type'=>['individual'],
            'parent'=>'发布不适当内容对我造成骚扰',
            'solutions'=>[
                'submit'
            ],
        ],
        '赌博'=>[
            'type'=>['individual'],
            'parent'=>'发布不适当内容对我造成骚扰',
            'solutions'=>[
                'submit'
            ],
        ],
        '政治谣言'=>[
            'type'=>['individual'],
            'parent'=>'发布不适当内容对我造成骚扰',
            'solutions'=>[
                'submit'
            ],
        ],
        '暴恐血腥'=>[
            'type'=>['individual'],
            'parent'=>'发布不适当内容对我造成骚扰',
            'solutions'=>[
                'submit'
            ],
        ],
        '其他违规内容'=>[
            'type'=>['individual'],
            'parent'=>'发布不适当内容对我造成骚扰',
            'solutions'=>[
                'submit'
            ],
        ],
        '存在欺诈骗钱行为'=>[
            'type'=>['individual'],
            'parent'=>'',
        ],
        '仿冒他人诈骗骗钱'=>[
            'type'=>['individual'],
            'parent'=>'存在欺诈骗钱行为',
            'solutions'=>[
                'submit'
            ],
        ],
        '其它诈骗骗钱行为'=>[
            'type'=>['individual'],
            'parent'=>'存在欺诈骗钱行为',
            'solutions'=>[
                'submit'
            ],
        ],
        '此账号可能被盗用了'=>[
            'type'=>['individual'],
            'parent'=>'',
            'solutions'=>[
                'submit'
            ],
        ],
        '群成员存在赌博行为'=>[
            'type'=>['group'],
            'parent'=>'',
            'solutions'=>[
                'submit'
            ],
        ],
        '群成员存在欺诈骗钱行为'=>[
            'type'=>['group'],
            'parent'=>'',
            'solutions'=>[
                'submit'
            ],
        ],
        '群成员发布不适当信息对我进行骚扰'=>[
            'type'=>['group'],
            'parent'=>'',
            'solutions'=>[
                'submit'
            ],
        ],
        '群成员传播谣言信息'=>[
            'type'=>['group'],
            'parent'=>'',
            'solutions'=>[
                'submit'
            ],
        ],
    ],
];

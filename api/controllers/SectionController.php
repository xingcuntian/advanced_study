<?php

namespace api\controllers;

use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\helpers\ArrayHelper;
use yii\web\Response;

class SectionController extends \yii\rest\ActiveController {

    public $modelClass = 'common\models\Section';

//    public function behaviors() {
//        return ArrayHelper::merge(parent::behaviors(), [
//                    'authenticator' => [
//                        //这个地方使用`ComopositeAuth` 混合认证
//                        'class' => CompositeAuth::className(),
//                        //authMethods` 中的每一个元素都应该是 一种 认证方式的类或者一个 配置数组
//                        'authMethods' => [
//                            HttpBasicAuth::className(),
//                            HttpBearerAuth::className(),
//                            QueryParamAuth::className(),
//                        ],
//                    ],
//        ]);
//    }

    public function init() {
        parent::init();
        \Yii::$app->user->enableSession = false;
    }

    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

    public function behaviors() {
        $behaviors = parent::behaviors();
        $behaviors['rateLimiter']['enableRateLimitHeaders'] = false;
        return $behaviors;
    }

//    public function behaviors() {
//        $behaviors = parent::behaviors();
//        $behaviors['authenticator'] = [
//            'class' => CompositeAuth::className(),
//            'authMethods' => [
//                QueryParamAuth::className(),
//            ],
//        ];
//        $behaviors['contentNegotiator']['formats']['application/json'] = Response::FORMAT_JSON;
//        //  $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_HTML;
//        return $behaviors;
//    }
}

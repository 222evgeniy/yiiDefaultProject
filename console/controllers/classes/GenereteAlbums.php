<?php

namespace console\controllers\classes;

use common\models\Album;
use common\models\Photo;
use common\models\User;
use Faker\Factory;
use Faker\Generator;
use yii\base\BaseObject;

/**
 * Class GenereteAlbums
 *
 * @package console\controllers\classes
 */
class GenereteAlbums extends BaseObject
{
    /** @var array */
    private $users;

    /** @var Generator */
    private $faker;

    /**
     * @param $config
     */
    public function __construct($config = [])
    {
        $this->users = User::find()->all();

        if(empty($this->users)) {
            throw new \RuntimeException('User no found');
        }

        $this->faker = Factory::create();
        parent::__construct($config);
    }

    /**
     * @param $count
     *
     * @return void
     */
    public function generator(): void
    {
        try {
            foreach ($this->users as $user) {
                $this->fillFakeAlbum($user);
            }
        } catch (\Exception $e) {
            \Yii::$app->errorHandler->logException($e);
            \yii\helpers\VarDumper::dump($e->getMessage(), 6, 0);
        }
    }

    /**
     * @param Album $album
     *
     * @return void
     */
    private function fillFakePhoto(Album $album): void
    {
        $photo = new Photo();
        for ($i = 0; $i <= 1000; $i++) {
            $clone = clone $photo;
            $clone->title = $this->faker->text($this->faker->numberBetween(1, 100));
            $clone->album_id = $album->id;
            $clone->save();
        }
    }

    /**
     * @param User $user
     *
     * @return void
     */
    private function fillFakeAlbum(User $user): void
    {
        $album = new Album();
        for ($i = 0; $i <= 100; $i++) {
            $clone = clone $album;
            $clone->title = $this->faker->text($this->faker->numberBetween(10, 100));
            $clone->user_id = $user->id;
            $clone->save();
            $this->fillFakePhoto($clone);
        }
    }

}

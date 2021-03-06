<?php

namespace Engine\Core\Config;

class Config
{
    /**
     * @param $key
     * @param string $group
     * @return mixed|null
     * @throws \Exception
     */
    public static function item($key, $group = 'main')
    {
        $groupItems = static::file($group);

        return isset($groupItems[$key]) ? $groupItems[$key] : null;

    }

    /**
     * @param $group
     * @return array
     * @throws \Exception
     */
    public static function file($group)
    {
        $path = $_SERVER['DOCUMENT_ROOT'] . '/' . mb_strtolower(ENV) . '/Config/' . $group . '.php';

        if (file_exists($path)) {

            $items = require_once $path;

            if (!empty($items)) {

                return $items;

            } else {

                throw new \Exception(
                    sprintf(
                        'Config file %s is not valid array.', $path
                    )
                );
            }

        } else {

            throw new \Exception(
              sprintf('Cannot load config from file, <strong>%s</strong> does not exist.', $path)
            );
        }
        return false;
    }
}
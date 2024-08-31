<?php

namespace Websyspro\Common
{
  use ReflectionFunction;

  class Utils
  {
    public static function ShitArray(
      array $arr = []
    ): mixed {
      return array_shift($arr);
    }

    public static function DestructArrayKeys(
      array $columnArr = []
    ): array {
      return [
        static::ShitArray(
          array_keys( $columnArr )
        ),
        $columnArr[
          static::ShitArray(
            array_keys( $columnArr )
          )
        ]
      ];
    }
    
    public static function ObterNumberOfArgs(
      callable $callable
    ): int {
      return (
        new ReflectionFunction($callable)
      )->getNumberOfParameters();
    }

    public static function Join(
      array $JoinArr,
      string $JoinSeparetor = ","
    ): string {
      return implode(
        $JoinSeparetor,
        $JoinArr
      );
    }
    
    public static function IsValidArray(
      array $IsValidArr = []
    ): bool {
      return is_array($IsValidArr) 
          && sizeof($IsValidArr);
    }

    public static function IsEmptyArray(
      array $IsEmptyArray = []
    ): bool {
      return sizeof($IsEmptyArray) 
         === 0;
    }

    public static function Mapper(
      array $MapperArr,
      callable $MapperCallable
    ): array {
      if (static::ObterNumberOfArgs(
        $MapperCallable
      ) === 2 ) {
        return array_map(
          $MapperCallable, 
          $MapperArr, array_keys(
            $MapperArr
          )
        );
      } else {
        return array_map(
          $MapperCallable, 
          $MapperArr
        );
      }
    }

    public static function Filter(
      array $MapperArr,
      callable $MapperCallable    
    ): array {
      if (static::ObterNumberOfArgs(
        $MapperCallable
      ) === 2 ) {
        return array_filter(
          $MapperArr,
          $MapperCallable, ARRAY_FILTER_USE_BOTH
        );
      } else {
        return array_filter(
          $MapperArr,
          $MapperCallable
        );
      }
    }

    static function ArrayFlip(
      array $ArrayFlip = []
    ): array {
      return array_flip(
        $ArrayFlip
      );
    }
  }
}
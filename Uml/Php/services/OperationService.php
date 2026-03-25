<?php 
class OperationService{
    protected static array $tabOperations=[];
    private function __construct()
    {
        throw new \Exception('Not implemented');
    }

     /**
     * Get the value of tabOperations
     */
    public static function getTabOperations(): array
    {
        return self::$tabOperations;
    }

     public static function addOperation(Operation $operation): void
     {
        self::$tabOperations[]=$operation;
     }
}
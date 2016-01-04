<?php

namespace Core;

class Core
{
    protected $vars;

    public function __construct( $application )
    {
        session_name( $application );
        session_start();

        $this -> vars = [];
    }

    public function vars( ...$arguments )
    {
        if( count( $arguments ) == 1 )
        {
            list( $key ) = $arguments;
            return ( !empty( $this -> vars[ $key ] ) ) ? $this -> vars[ $key ] : null;
        }
        else if( count( $arguments ) == 2 )
        {
            list( $key, $value ) = $arguments;
            return ( is_null( $value ) ) ? $this -> vars[ $key ] = null : $this -> vars[ $key ] = $value;
        }
    }

    public function session( ...$arguments )
    {
        if( count( $arguments ) == 1 )
        {
            list( $key ) = $arguments;
            return ( !empty( $_SESSION[ $key ] ) ) ? $_SESSION[ $key ] : null;
        }
        else if( count( $arguments ) == 2 )
        {
            list( $key, $value ) = $arguments;
            return ( is_null( $value ) ) ? $_SESSION[ $key ] = null : $_SESSION[ $key ] = $value;
        }
    }
}
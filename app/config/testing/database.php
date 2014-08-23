<?php
return array(
  'default' => 'mysql',
  'connections' => array(
    'sqlite' => array(
      'driver'   => 'mysql',
      'database' => ':memory:',
      'prefix'   => ''
    ),
  )
);
<?php

/* Bopini, Copyright (c) Andrea Davanzo, License MPL v2.0 */

declare(strict_types=1);

function bopini_tokens(): array
{
  return [
    T_CASE => 'selection',
    T_DEFAULT => 'selection',
    T_ELSE => 'selection',
    T_ELSEIF => 'selection',
    T_IF => 'selection',
    T_MATCH => 'selection',
    T_SWITCH => 'selection',

    T_DO => 'repetition',
    T_FOR => 'repetition',
    T_FOREACH => 'repetition',
    T_WHILE => 'repetition',

    T_AND_EQUAL => 'sequence',
    T_ARRAY_CAST => 'sequence',
    T_BREAK => 'sequence',
    T_CATCH => 'sequence',
    T_CLONE => 'sequence',
    T_COALESCE_EQUAL => 'sequence',
    T_CONCAT_EQUAL => 'sequence',
    T_CONTINUE => 'sequence',
    T_DEC => 'sequence',
    T_DIV_EQUAL => 'sequence',
    T_ECHO => 'sequence',
    T_EXIT => 'sequence',
    T_INC => 'sequence',
    T_INCLUDE => 'sequence',
    T_INCLUDE_ONCE => 'sequence',
    T_LIST => 'sequence',
    T_MINUS_EQUAL => 'sequence',
    T_MOD_EQUAL => 'sequence',
    T_MUL_EQUAL => 'sequence',
    T_NEW => 'sequence',
    T_OBJECT_CAST => 'sequence',
    T_OR_EQUAL => 'sequence',
    T_PLUS_EQUAL => 'sequence',
    T_POW => 'sequence',
    T_POW_EQUAL => 'sequence',
    T_PRINT => 'sequence',
    T_REQUIRE => 'sequence',
    T_REQUIRE_ONCE => 'sequence',
    T_RETURN => 'sequence',
    T_SL => 'sequence',
    T_SL_EQUAL => 'sequence',
    T_SR => 'sequence',
    T_SR_EQUAL => 'sequence',
    T_STRING_CAST => 'sequence',
    T_THROW => 'sequence',
    T_TRY => 'sequence',
    T_UNSET => 'sequence',
    T_UNSET_CAST => 'sequence',
    T_XOR_EQUAL => 'sequence',
  ];
}

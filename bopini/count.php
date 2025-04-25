<?php

/* Bopini, Copyright (c) Andrea Davanzo, License MPL v2.0 */

declare(strict_types=1);

require BOPINI_DIR . '/tokens.php';

function bopini_count(string $code): array
{
  $counts = [];
  foreach (bopini_tokens() as $token => $type) {
    $counts['type'][$type] = 0;
    $counts['token'][token_name($token)] = 0;
  }

  foreach (token_get_all($code) as $token) {
    $token_id = $token[0] ?? '';

    if (isset(bopini_tokens()[$token_id])) {
      $counts['type'][bopini_tokens()[$token_id]]++;
      $counts['token'][token_name($token[0])]++;
    }
  }

  return $counts;
}

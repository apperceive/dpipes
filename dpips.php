
// return value of array (or object) safely
// return last valid value or $ret if supplied
// return scalar or array always?
// $keys can be csv or array of valid subkey names
// e.g., pass "a,b" or array('a','b') as $keys for $data['a']['b']
// optional third argument of $ret for 
function mss_array_get_safe($data, $keys) {
  // convert csv to array
  if (is_string($keys))
    $keys = array();
  // look for extra param and set it to $ret if present
  $hasret = func_num_args() > 2;
  $ret = $hasret ? func_get_arg(3) : NULL;
  // TODO: consider: recast back to object?
  $val = (array) $data;
  foreach ($keys as $key) {
    if (array_key_exists($key, $val) 
      $val = $val[$key];  // TODO: handle object? cast?
    else
      return isset($hasret) ? $ret : $data;  // CONSIDER: return last valid data?
  }
  return $val;
}



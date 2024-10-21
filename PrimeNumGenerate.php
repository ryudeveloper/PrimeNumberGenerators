<?php

class Prime
{
  // Miller-Rabin Primality Test
  private function millerRabin($n, $k = 5)
  {
    if ($n < 2)
      return false;
    if ($n == 2 || $n == 3)
      return true;
    if ($n % 2 == 0)
      return false;

    // Write n-1 as 2^s * d
    $s = 0;
    $d = $n - 1;
    while ($d % 2 == 0) {
      $d /= 2;
      $s++;
    }

    // Test k times
    for ($i = 0; $i < $k; $i++) {
      $a = rand(2, $n - 2);  // Random base between 2 and n-2
      $x = bcpowmod($a, $d, $n);  // a^d % n

      if ($x == 1 || $x == $n - 1)
        continue;

      $continueLoop = false;
      for ($r = 0; $r < $s - 1; $r++) {
        $x = bcpowmod($x, 2, $n);

        if ($x == $n - 1) {
          $continueLoop = true;
          break;
        }
      }

      if (!$continueLoop)
        return false;  // Definitely composite
    }
    return true;  // Probably prime
  }
  public function generate(float $min, int $num)
  {
    $primes = [];
    $candidate = max(ceil($min), 2);

    while (count($primes) < $num) {
      if ($this->millerRabin($candidate)) {
        $primes[] = $candidate;
      }
      $candidate++;
    }

    return $primes;
  }
}
// Usage example:
$primeGenerator = new Prime();
$min = 1000;
$num = 10;
$primes = $primeGenerator->generate($min, $num);
var_dump($primes);

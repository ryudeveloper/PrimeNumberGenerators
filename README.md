# PrimeNumberGenerators
Prime Number Generators created for Doug Bierer's book

# Miller-Rabin Test:
  The millerRabin function is a probabilistic test to determine if a number is prime.
  The test works by representing n-1 as 2^s * d, then checking multiple random bases (a) to see if the number behaves like a prime.
  The probability of a false prime decreases exponentially with each iteration of the test (with a default of 5 iterations for this implementation).

# Generate Method:
  This method starts generating primes from the min value or the smallest possible prime (2).
  It continues generating primes until it reaches the desired number of primes ($num).
  The Miller-Rabin test is used to check if each candidate number is prime.

# Bcpowmod:
  This function is used for efficiently computing a^b % c using the binary exponentiation method, which is crucial for handling large numbers involved in primality tests.

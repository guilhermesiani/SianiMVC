<?php
namespace Libs;

/**
 * classe Hash
 * @param string $algo Algorítimo (md5, sha1, whirlpool, etc)
 * @param string $data Variável para codificar
 * @param string $salt O escudo
 * @return string A protegida/codificada $data
 */
class Hash
{
	public static function create($algo, $data, $salt)
	{
		$context = hash_init($algo, HASH_HMAC, $salt);
		hash_update($context, $data);

		return hash_final($context);
	}
}
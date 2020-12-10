<?php

class Region extends Model
{
	public static function getRegionList($region = '')
	{
		$cityList = array();
		$db = Db::getConnection();

		$sql = 'SELECT city FROM region WHERE city LIKE CONCAT("%", :region, "%")';

		$result = $db->prepare($sql);
		$result->bindParam(':region', $region, PDO::PARAM_STR);
		$result->execute();

		$i = 0;
		while ($row = $result->fetch()) {
			$cityList[$i] = $row['city'];
			$i++;
		}

		return $cityList;
	}

	public static function getRegionItem($regInfoParam)
	{
		$regionItem = array();

		$db = Db::getConnection();

		if (preg_match('~[a-z]~', $regInfoParam)) {
			$sql = 'SELECT id, name, city FROM region WHERE transliteration=:transliteration';

			$result = $db->prepare($sql);
			$result->bindParam(':transliteration', $regInfoParam, PDO::PARAM_STR);
			$result->execute();

			$row = $result->fetch();
			$regionItem['id'] = $row['id'];
			$regionItem['name'] = $row['name'];
			$regionItem['city'] = $row['city'];
			$regionItem['transliteration'] = $regInfoParam;
		} else {
			$sql = 'SELECT id, name, transliteration FROM region WHERE city=:city';

			$result = $db->prepare($sql);
			$result->bindParam(':city', $regInfoParam, PDO::PARAM_STR);
			$result->execute();

			$row = $result->fetch();
			$regionItem['id'] = $row['id'];
			$regionItem['name'] = $row['name'];
			$regionItem['city'] = $regInfoParam;
			$regionItem['transliteration'] = $row['transliteration'];
		}

		return $regionItem;
	}
}

<?php
class NewsModules_ClearCache_Model_Observer
{
	public function refreshCache()
	{
		try
		{
			$allTypes = Mage::app()->useCache();
			foreach($allTypes as $type => $void)
			{
				Mage::app()->getCacheInstance()->cleanType($type);
			}
		}
		catch (Exception $e)
		{
			Mage::log($e->getMessage(), NULL, 'clearcache.log');
		}
		return $this;
	}
	
	public function refreshImages()
	{
		try
		{
			Mage::getModel('catalog/product_image')->clearCache();
		}
		catch (Exception $e)
		{
			Mage::log($e->getMessage(), NULL, 'clearcache.log');
		}
		return $this;
	}
}
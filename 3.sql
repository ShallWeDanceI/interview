SELECT `data`.`type`, `data`.`value` FROM `data` INNER JOIN (
SELECT `type`, MAX(`date`) as `maxdate`
FROM `data`
GROUP BY `type`) AS `tmpdata` ON `data`.`date`=`tmpdata`.`maxdate` AND `tmpdata`.`type`=`data`.`type`
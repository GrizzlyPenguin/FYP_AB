SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

CREATE TABLE IF NOT EXISTS `TimeLog` (
`LogID` int(3) NOT NULL,
  `BudgetTime` time NOT NULL,
  `Start` int(3) NOT NULL,
    `Completed` int(3) NOT NULL,
    `TotalTimeUsed` time NOT NULL, 
    `Status` char(15) NOT NULL,
    `UAT` char(6)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

ALTER TABLE `TimeLog`
 ADD PRIMARY KEY (`LogID`);




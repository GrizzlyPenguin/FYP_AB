SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE TABLE IF NOT EXISTS `EMPLOYEE` (
`EmpID` int(4) NOT NULL,
  `EmpName` varchar(20) NOT NULL,
    `Password` varchar(15) NOT NULL,
  `SuperID` int(3) NOT NULL,
    `Role` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `EMPLOYEE` (`EmpID`, `EmpName`, `Password`, `Role`) VALUES
(1, 'Felix', 'admin','admin');

ALTER TABLE `EMPLOYEE`
 ADD PRIMARY KEY (`EmpID`,`SuperID`);
 
 ALTER TABLE `EMPLOYEE`
MODIFY `EmpID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
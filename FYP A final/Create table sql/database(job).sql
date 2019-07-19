SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE TABLE IF NOT EXISTS `JOB` (
`EmpID` int(3) NOT NULL,
  `EmpName` varchar(20) NOT NULL,
  `SuperID` int(3) NOT NULL,
    `SuperName` varchar(20) NOT NULL,
    `TicketNo` int NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


/*ALTER TABLE `EMPLOYEE`
 ADD PRIMARY KEY (``);*/
 
 
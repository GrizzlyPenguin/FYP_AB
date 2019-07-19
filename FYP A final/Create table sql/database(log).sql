SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET GLOBAL time_zone = '+8:00';

CREATE TABLE IF NOT EXISTS `Log` (
`LogID` int(3) NOT NULL,
  `LogDesc` varchar(100) NOT NULL,
  `TicketNo` int(3) NOT NULL,
    `EmpID` int(3) NOT NULL,
    `SaveDate` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

ALTER TABLE `Log`
 ADD PRIMARY KEY (`LogID`);

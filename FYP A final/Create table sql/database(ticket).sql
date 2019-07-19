SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET GLOBAL time_zone = '+8:00';


CREATE TABLE IF NOT EXISTS `TICKET` (
`TicketNo` int(3) NOT NULL,
  `TicketTitle` varchar(20) NOT NULL,
  `TicketDesc` varchar(50) NOT NULL,
    `PID` int(3) NOT NULL,
    `Status` varchar(10) NOT NULL,
    `DateReceived` date NOT NULL,
    `StaffID` int(3) NOT NULL REFERENCES EMPLOYEE(EmpID)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;




ALTER TABLE `TICKET`
 ADD PRIMARY KEY (`TicketNo`);


ALTER TABLE `TICKET`
MODIFY `TicketNo` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;


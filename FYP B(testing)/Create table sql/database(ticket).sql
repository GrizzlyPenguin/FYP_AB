SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

CREATE TABLE IF NOT EXISTS `TICKET` (
`TicketNo` int(3) NOT NULL,
  `TicketTitle` varchar(20) NOT NULL,
  `TicketDesc` varchar(50) NOT NULL,
    `PID` int(3) NOT NULL REFERENCES CUSTOMER(CustID),
    `Status` varchar(10) NOT NULL,
    `DateReceived` date NOT NULL,
    `DomainName` varchar(63) NOT NULL,
    `SourceOnline` varchar(50) NOT NULL,
    `SourceOffline` varchar(50) NOT NULL,
    `Warranty` char(3),
    `StaffID` int(3) REFERENCES EMPLOYEE(EmpID),
    `AdditionalTicketDesc` varchar(50),
    `JobID` varchar(3)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

ALTER TABLE `TICKET`
 ADD PRIMARY KEY (`TicketNo`);

ALTER TABLE `TICKET`
MODIFY `TicketNo` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;


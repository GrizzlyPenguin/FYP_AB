SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

CREATE TABLE IF NOT EXISTS `HISTORYLOG` (
`TicketNo` int(3) NOT NULL REFERENCES TICKET(TicketNo),
    `EmpID` int(4) NOT NULL REFERENCES EMPLOYEE(EmpID),
    `Diagnosis` varchar(100),
    `Findings` varchar(100),
    `Others` varchar(100),
    `Cause` varchar(100)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

ALTER TABLE `HISTORYLOG`
 ADD PRIMARY KEY (`TicketNo`, `EmpID`);


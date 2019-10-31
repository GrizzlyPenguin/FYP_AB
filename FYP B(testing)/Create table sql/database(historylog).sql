SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

CREATE TABLE IF NOT EXISTS `HISTORYLOG` (
    `LogID` int(3) NOT NULL,
    `TicketNo` int(3) NOT NULL REFERENCES TICKET(TicketNo),
    `EmpID` int(4) NOT NULL REFERENCES EMPLOYEE(EmpID),
    `Descriptions` varchar(100),
    `Diagnosis` varchar(100),
    `Findings` varchar(100),
    `Others` varchar(100),
    `Cause` varchar(100),
    `WrittenBy` varchar(20)
    
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

ALTER TABLE `HISTORYLOG`
 ADD PRIMARY KEY (`LogID`);

ALTER TABLE `HISTORYLOG`
MODIFY `LogID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;

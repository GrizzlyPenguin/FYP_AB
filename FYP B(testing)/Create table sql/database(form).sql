SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";



CREATE TABLE IF NOT EXISTS `FORM` (
  `TicketNo` int(3) NOT NULL REFERENCES TICKET(TicketNo),
  `JobType` varchar(50) NOT NULL REFERENCES JOB(JobType),
  `Name` varchar(100) NOT NULL REFERENCES CUSTOMER(CustomerName),
    `PID` int(3) NOT NULL,
    `Warranty` char(3) NOT NULL,
    `Diagnosis` varchar(500) NOT NULL,
    `Findings` varchar(500) NOT NULL,
    `Others` varchar(100) NOT NULL,
    `Cause` varchar(100) NOT NULL,
    `Status` varchar(10) NOT NULL,
    `DateReceived` date NOT NULL,
    `StaffID` int(3) NOT NULL REFERENCES EMPLOYEE(EmpID)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


ALTER TABLE `FORM`
 ADD PRIMARY KEY (`TicketNo`);


ALTER TABLE `FORM`
MODIFY `TicketNo` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;


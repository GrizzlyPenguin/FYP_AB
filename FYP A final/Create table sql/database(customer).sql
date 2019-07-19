SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+08:00";


CREATE TABLE IF NOT EXISTS `CUSTOMER` (
`CustID` int(3) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Address` varchar(50) NOT NULL,
    `Email` varchar(30) NOT NULL,
    `ContactNumber` varchar(11) NOT NULL,
    `username` varchar(20) NOT NULL,
    `Password` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


ALTER TABLE `CUSTOMER`
 ADD PRIMARY KEY (`CustID`);


ALTER TABLE `CUSTOMER`
MODIFY `CustID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;


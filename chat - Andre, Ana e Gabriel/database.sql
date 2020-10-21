-- drop database chat;
create database if not exists chat;
use chat;

CREATE TABLE `messages` (
  `IdMessage` int(8) NOT NULL COMMENT '(PK) ID da mensagem',
  `FromNickname` varchar(32) NOT NULL COMMENT 'Nickname do remetente',
  `Message` text COMMENT 'Mensagem',
  `MessageDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Data da mensagem',
  PRIMARY KEY (`IdMessage`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Mensagens do chat';

CREATE TABLE `users` (
  `Nickname` varchar(32) NOT NULL COMMENT '(PK) Nickname do utilizador',
  `Password` varchar(32) NOT NULL COMMENT 'Senha do utilizador',  
  `LoginDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Data do login',
 PRIMARY KEY (`Nickname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Utilizadores do chat';








ALTER TABLE `messages`
  MODIFY `IdMessage` int(8) NOT NULL AUTO_INCREMENT COMMENT '(PK) ID da mensagem';


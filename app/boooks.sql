delimiter //
create procedure sp_getAllBooks()
Begin
    Select * from books;
End //
delimiter ;
call sp_getAllBooks;

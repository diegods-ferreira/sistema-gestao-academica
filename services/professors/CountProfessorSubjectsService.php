<?php
  class CountProfessorSubjectsService {
    public static function execute($id) {
      $connection = Connection::connect();

      $query = '
        select count(1) as dependencies
        from professor_subjects ps
        where ps.professor_id = :id
      ';

      $statement = $connection->prepare($query);
      $statement->bindValue(':id', $id);
      $statement->execute();

      return $statement->fetch(PDO::FETCH_OBJ);
    }
  }
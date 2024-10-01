<?php
require_once 'configs/database.php';

abstract class BaseModel
{
    // Database connection
    protected static $_connection;

    public function __construct()
    {

        if (!isset(self::$_connection)) {
            self::$_connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
            if (self::$_connection->connect_errno) {
                printf("Connect failed");
                exit();
            }
        }
    }

    /**
     * Query in database
     * @param $sql
     */
    protected function query($sql)
    {

        $result = self::$_connection->query($sql);
        return $result;
    }

    /**
     * Select statement
     * @param $sql
     */
    protected function select($sql)
    {
        $result = $this->query($sql);
        $rows = [];
        if (!empty($result)) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }
        return $rows;
    }

    /**
     * Delete statement
     * @param $sql
     * @return mixed
     */
    protected function delete($sql)
    {
        $result = $this->query($sql);
        return $result;
    }

    /**
     * Update statement
     * @param $sql
     * @return mixed
     */
    // protected function update($sql) {
    //     $result = $this->query($sql);
    //     return $result;
    // }
    protected function update($sql)
    {
        $result = $this->query($sql);
        if ($result) {
            return true; // Trả về true nếu cập nhật thành công
        } else {
            // Nếu có lỗi, bạn có thể log lỗi hoặc xử lý theo cách bạn muốn
            error_log('Update error: ' . mysqli_error(self::$_connection));
            return false; // Trả về false nếu có lỗi
        }
    }


    /**
     * Insert statement
     * @param $sql
     */
    protected function insert($sql)
    {
        $result = $this->query($sql);
        return $result;
    }
}

<center>
    <h1>
        留言列表
    </h1>
    <a href="showMessage.php">刷新列表</a>
    <hr style="width: 90%;" />
    <table border="1" width="700">
        <tr>
            <th>留言id</th>
            <th>留言时间</th>
            <th>留言内容</th>
            <th>操作</th>
        </tr>
        <?php
        session_start();
        header("Content-type: text/html; charset=utf-8");


        // 从数据库取出数据
        $servernameDB = "localhost";
        $usernameDB = "root";
        $passwordDB = "";
        $nameDB = "MessageDB";

        // 创建连接
        $conn = new mysqli($servernameDB, $usernameDB, $passwordDB, $nameDB);
        // Check connection
        if ($conn->connect_error) {
            die("连接失败: " . $conn->connect_error);
        }
        if ($_SESSION['permission'] = 0) {
            $sql = "SELECT id, date, content FROM passedmessages";
            $result = $conn->query($sql);


            if ($result->num_rows > 0) {
                // 输出数据
                while ($row = $result->fetch_assoc()) {
                    //        echo "id: " . $row["id"]. " - date: " . $row["date"]. " " . $row["content"]. "<br>";
                    echo "<tr style='text-align: center'>";
                    echo "<td>{$row["id"]}</td>";
                    echo "<td>{$row["date"]}</td>";
                    echo "<td>{$row["content"]}</td>";
                    echo "<td><a href='deleteItem.php?id={$row['id']}'>删除</a> <a href='passItem.php?id={$row['id']}'>通过</a></td>";
                    echo "</tr>";
                    echo "<br/>";
                }
            } else {
                echo "0 结果";
            }
            $conn->close();
        } if ($_SESSION['permission'] = 1) {
            $sql = "SELECT id, date, content FROM messages";
            $result = $conn->query($sql);


            if ($result->num_rows > 0) {
                // 输出数据
                while ($row = $result->fetch_assoc()) {
                    //        echo "id: " . $row["id"]. " - date: " . $row["date"]. " " . $row["content"]. "<br>";
                    echo "<tr style='text-align: center'>";
                    echo "<td>{$row["id"]}</td>";
                    echo "<td>{$row["date"]}</td>";
                    echo "<td>{$row["content"]}</td>";
                    echo "<td><a href='deleteItem.php?id={$row['id']}'>删除</a> <a href='passItem.php?id={$row['id']}'>通过</a></td>";
                    echo "</tr>";
                    echo "<br/>";
                }
            } else {
                echo "0 结果";
            }
            $conn->close();
        }
        ?>



    </table>
</center>
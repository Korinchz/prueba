<?php 

    class Ticket extends Conectar{

        public function insert_ticket($usu_id,$cat_id,$tick_titulo,$tick_descrip){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "call sp_i_ticket(?,?,?,?)";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$usu_id);
            $sql->bindValue(2,$cat_id);
            $sql->bindValue(3,$tick_titulo);
            $sql->bindValue(4,$tick_descrip);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        public function listar_ticket_x_usu($usu_id){
            $conectar = parent::conexion();
            parent::set_names();   
            $sql = "call sp_listar_tick_x_usu(?)";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$usu_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        public function listar_ticket_x_id($tick_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="call sp_l_ticket_x_id(?)";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $tick_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function listar_ticket(){
            $conectar = parent::conexion();
            parent::set_names();   
            $sql = "call sp_l_ticket()";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        public function listar_ticketdetalle_x_ticket($tick_id){
            $conectar = parent::conexion();
            parent::set_names();   
            $sql = "call sp_l_ticketdetalle_xticket(?)";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$tick_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        public function insert_ticketdetalle($tick_id,$usu_id,$tickd_descrip){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "call sp_i_ticket_d(?,?,?)";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$tick_id);
            $sql->bindValue(2,$usu_id);
            $sql->bindValue(3,$tickd_descrip);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        public function update_ticket($tick_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="call sp_u_ticket(?)";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $tick_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_ticketdetalle_cerrar($tick_id,$usu_id){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "call sp_i_ticketdetalle_01(?,?)";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1,$tick_id);
            $sql->bindValue(2,$usu_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        public function get_ticket_total(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "call sp_t_ticket()";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        public function get_ticket_totalabierto(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "call sp_t_ticket_abierto()";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        public function get_ticket_totalcerrado(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "call sp_t_ticket_cerrado()";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

        public function get_ticket_grafico(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "call sp_t_ticketgrafico()";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }
    }

?>
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PeliculaModel extends CI_Model{

    /**
     * Modelo que devuelve un listado con toda la información de peliculas.
     * 
     * @param int $limit Opcional. Limita la cantidad del listado.
     */
    public function getPelicula(int $limit = null){
        return $this->db->get('pelicula', $limit)->result();
    }

    /**
     * Modelo que elimina la pelicula especificada por ID.
     * 
     * @param int $id El ID de la pelicula.
     */
    public function deletePeliculaById(int $id){
        return $this->db->delete('pelicula', array('id' => $id));
    }

    /**
     * Modelo que devuelve la pelicula especificada
     * 
     * @param int $id El ID de la pelicula.
     */
    public function getPeliculaById_and_Categoria(int $id) {
        // Realizar una consulta a la base de datos para obtener los detalles de la película y tabla categoria en base al ID de la pelicula
        $this->db->select('pelicula.*, categoria.nom_categoria, categoria.id_categoria');
        $this->db->join('categoria', 'pelicula.categoria_id = categoria.id_categoria');
        $this->db->where('pelicula.id', $id);
        return $this->db->get('pelicula')->row();
    }

    /**
     * Modelo que modifica los datos de la pelicula especificada.
     * 
     * @param $id El ID de la pelicula.
     * @param $nombre El Nombre de la pelicula.
     * @param $direccion La Direccion de la pelicula.
     * @param $descripcion La Descripion de la pelicula.
     */
    public function modificarPelicula($id, $nombre, $direccion, $descripcion) {
        // Actualizar los datos de la película en la base de datos
        $datos = array(
            'nom' => $nombre,
            'direccion' => $direccion,
            'descripcion' => $descripcion
        );
        $this->db->where('id', $id);
        $this->db->update('pelicula', $datos);
    }

    public function test($id){
        $this->db->select('pelicula.nom, categoria.nom_categoria');
        $this->db->from('pelicula');
        $this->db->join('categoria', 'pelicula.categoria_id = categoria.id_categoria');
        $this->db->where('pelicula.id', $id);
        $this->db->group_by('pelicula.id');
        $query = $this->db->get();
        return $query->result();
    }

    public function getCategorias(){
        return $this->db->get('categoria')->result();
    }
}
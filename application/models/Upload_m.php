<?php
class Upload_m extends CI_Model
{
    public function upl($path)
    {
        $config['upload_path'] = "./asset/dist/img/$path/";
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']     = '2048';
        $this->load->library('upload');
        $this->upload->initialize($config);
        if ($this->upload->do_upload('gambar')) {
            $data = [
                'result' => 1,
                'file' => $this->upload->data(),
                'error' => ''
            ];
            return $data;
        } else {
            $data = [
                'result' => '',
                'file' => $this->upload->display_errors(),
                'error' => 0
            ];
            return $data;
        }
    }
    function multiple($path, $gambar)
    {
        $config['upload_path'] = "./asset/dist/img/$path/";
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size']     = '2048';
        $this->load->library('upload');
        $this->upload->initialize($config);
        if ($this->upload->do_upload("$gambar")) {
            $data = [
                'result' => 1,
                'file' => $this->upload->data(),
                'error' => ''
            ];
            return $data;
        } else {
            $data = [
                'result' => '',
                'file' => $this->upload->display_errors(),
                'error' => 0
            ];
            return $data;
        }
    }
}

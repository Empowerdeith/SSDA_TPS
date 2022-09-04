<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UpdateUserRequest;

class ManageUserController extends Controller
{
    public function showUsers(){

        $users = User::paginate(10);      
        return view('manageUsers.showUsers', compact('users'));
    }
        

    public function updateUserView($id){

        $user = User::findOrFail($id);      
        return view('manageUsers.updateUser', compact('user'));
    }

    public function updateUser(UpdateUserRequest $request, $id){

        $user = User::findOrFail($id);            
            
        if ( ! ( $request->name == NULL )){
            $user -> name = $request->name;
        }
        if ( ! ( $request->rut == NULL )){
            $user -> rut = $request->rut;
        }
        if ( ! ( $request->username == NULL )){
            $user -> username = $request->username;
        }
        if ( ! ( $request->email == NULL )){
            $user -> email = $request->email;
        }
        if ( ! ( $request->password == NULL )){
            $user -> password = $request->password;
        }
        if ( ! ( $request->cargo == NULL )){
            $user -> cargo = $request->cargo;
        }

        $user -> save();

        return redirect()->back()->with('success', 'Usuario Actualizado');

    }

    public function deleteUserView($id){

        $user = User::findOrFail($id);      
        return view('manageUsers.deleteUser', compact('user'));
    }

    public function deleteUser($id){

        $user = User::findOrFail($id);
        $user -> delete();
        return redirect('/showUsers');
    }

    

    public function faq(){
        return view('faq.faq');
    }

    public function phpRule_ValidarRut($rut) {

        // Verifica que no esté vacio y que el string sea de tamaño mayor a 3 carácteres(1-9)        
        if ((empty($rut)) || strlen($rut) < 3) {
            return array('error' => true, 'msj' => 'RUT vacío o con menos de 3 caracteres.');
        }

        // Quitar los últimos 2 valores (el guión y el dígito verificador) y luego verificar que sólo sea
        // numérico
        $parteNumerica = str_replace(substr($rut, -2, 2), '', $rut);

        if (!preg_match("/^[0-9]*$/", $parteNumerica)) {
            return array('error' => true, 'msj' => 'La parte numérica del RUT sólo debe contener números.');
        }

        $guionYVerificador = substr($rut, -2, 2);
        // Verifica que el guion y dígito verificador tengan un largo de 2.
        if (strlen($guionYVerificador) != 2) {
            return array('error' => true, 'msj' => 'Error en el largo del dígito verificador.');
        }

        // obliga a que el dígito verificador tenga la forma -[0-9] o -[kK]
        if (!preg_match('/(^[-]{1}+[0-9kK]).{0}$/', $guionYVerificador)) {
            return array('error' => true, 'msj' => 'El dígito verificador no cuenta con el patrón requerido');
        }

        // Valida que sólo sean números, excepto el último dígito que pueda ser k
        if (!preg_match("/^[0-9.]+[-]?+[0-9kK]{1}/", $rut)) {
            return array('error' => true, 'msj' => 'Error al digitar el RUT');
        }

        $rutV = preg_replace('/[\.\-]/i', '', $rut);
        $dv = substr($rutV, -1);
        $numero = substr($rutV, 0, strlen($rutV) - 1);
        $i = 2;
        $suma = 0;
        foreach (array_reverse(str_split($numero)) as $v) {
            if ($i == 8) {
                $i = 2;
            }
            $suma += $v * $i;
            ++$i;
        }
        $dvr = 11 - ($suma % 11);
        if ($dvr == 11) {
            $dvr = 0;
        }
        if ($dvr == 10) {
            $dvr = 'K';
        }
        if ($dvr == strtoupper($dv)) {
            return array('error' => false, 'msj' => 'RUT ingresado correctamente.');
        } else {
            return array('error' => true, 'msj' => 'El RUT ingresado no es válido.');
        }
    }
}
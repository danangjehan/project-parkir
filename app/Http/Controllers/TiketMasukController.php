<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TiketMasuk;

class TiketMasukController extends Controller
{
    public function index(){
        return view('tiket-masuk.index');
    }

    /**
     * engine for generate a random string, using a cryptographically secure
     * pseudorandom number generator (random_int).
     *
     * For PHP 7, random_int is a PHP core function
     *
     * @param int    $length   How many characters do we want?
     * @param string $keyspace A string of all possible characters
     *                         to select from
     */
    public function engineUniqueString(
        int $length = 64,
        string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
    ): string {
        if ($length < 1) {
            throw new \RangeException('Length must be a positive integer');
        }
        $pieces = [];
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $pieces[] = $keyspace[random_int(0, $max)];
        }

        return implode('', $pieces);
    }

    public function generateTiket(){
        $tiket = $this->engineUniqueString(7);
        TiketMasuk::create([
            'unique_character' => $tiket
        ]);

        return redirect()->route('tiket-masuk.cetak',['tiket' => $tiket]);
        
    }

    public function cetakTiket($tiket){
        return view('tiket-masuk.cetak',[
            'tiket' => $tiket
        ]);
    }
}

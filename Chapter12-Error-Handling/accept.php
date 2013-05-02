<?php

function parseAcceptHeader() {
    $hdr = $_SERVER['HTTP_ACCEPT'];
    $accept = array();
    foreach (preg_split('/\s*,\s*/', $hdr) as $i => $term) {
        $o = new \stdclass;
        $o->pos = $i;
        if (preg_match(",^(\S+)\s*;\s*(?:q|level)=([0-9\.]+),i", $term, $M)) {
            $o->type = $M[1];
            $o->q = (double)$M[2];
        } else {
            $o->type = $term;
            $o->q = 1;
        }
        $accept[] = $o;
    } 
    usort($accept, function ($a, $b) {
        /* first tier: highest q factor wins */
        $diff = $b->q - $a->q;
        if ($diff > 0) { 
            $diff = 1;
        } else if ($diff < 0) {
            $diff = -1;
        } else {
            /* tie-breaker: first listed item wins */
            $diff = $a->pos - $b->pos;
        }
        return $diff;
    });
    $accept_data = array();
    foreach ($accept as $a) {
        $accept_data[$a->type] = $a->type;
    } 
    return $accept_data;
}
 

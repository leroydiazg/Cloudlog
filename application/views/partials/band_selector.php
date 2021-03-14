<?php

/**
 * A helper to build the Band selectors
 *
 * Ideally, those bands could be stored and manage in the DB, as it is done with Modes. But from the
 * time being this helpers is enough to keep in one place the logic for building the Band/RX Band
 * selectors and, eventually, to "manage" them in a hardcoded-way.
 *
 * So, please considered this partial as a _temporary_ patch.
 */

$this->load->helper('form');

$default_name = 'band';

$hf_bands = ['160m', '80m', '60m', '40m', '30m', '20m', '17m', '15m', '12m', '11m', '10m'];
$vhf_bands = ['6m', '4m', '2m'];
$uhf_bands = ['70cm', '23cm', '13cm', '9cm'];
$microwave_bands = ['6cm', '3cm'];

$options = array(
  'HF' => array_combine($hf_bands, $hf_bands),
  'VHF' => array_combine($vhf_bands, $vhf_bands),
  'UFH' => array_combine($uhf_bands, $uhf_bands),
  'Microwave' => array_combine($microwave_bands, $microwave_bands)
);

if (isset($include_blank) && $include_blank === true) {
  array_unshift($options, "");
}

$attributes = array (
  'id' => $id ?? $default_name,
  'class' => $cssClass ?? 'form-control form-control-sm'
);

echo form_dropdown(
  $name ?? $default_name,
  $options,
  $selected,
  $attributes
);
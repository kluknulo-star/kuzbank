@extends('errors::minimal')

@section('title', 'Недостаточно прав')
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Недостаточно прав'))

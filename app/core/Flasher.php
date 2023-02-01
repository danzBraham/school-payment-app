<?php
class Flasher {
  public static function setFlash($type, $msg, $action) {
    $_SESSION['flash'] = [
      'type' => $type,
      'msg' => $msg,
      'action' => $action
    ];
  }

  public static function flash() {
    if (isset($_SESSION['flash'])) {
      echo '<div id="alert" class="alert alert-' . $_SESSION['flash']['type'] . '">
              <p>Data Siswa <strong>' . $_SESSION['flash']['msg'] . '</strong> ' . $_SESSION['flash']['action'] . '</p>
              <svg id="close-btn-alert" class="close-btn-alert" width="35" height="35" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="20" cy="20" r="17.5" fill="none"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M20 3.33333C10.7953 3.33333 3.33333 10.7953 3.33333 20C3.33333 29.2047 10.7953 36.6667 20 36.6667C29.2047 36.6667 36.6667 29.2047 36.6667 20C36.6667 10.7953 29.2047 3.33333 20 3.33333ZM0 20C0 8.95431 8.95431 0 20 0C31.0457 0 40 8.95431 40 20C40 31.0457 31.0457 40 20 40C8.95431 40 0 31.0457 0 20ZM11.5993 11.5993C12.2501 10.9484 13.3054 10.9484 13.9563 11.5993L20 17.643L26.0437 11.5993C26.6946 10.9484 27.7499 10.9484 28.4007 11.5993C29.0516 12.2501 29.0516 13.3054 28.4007 13.9563L22.357 20L28.4007 26.0437C29.0516 26.6946 29.0516 27.7499 28.4007 28.4007C27.7499 29.0516 26.6946 29.0516 26.0437 28.4007L20 22.357L13.9563 28.4007C13.3054 29.0516 12.2501 29.0516 11.5993 28.4007C10.9484 27.7499 10.9484 26.6946 11.5993 26.0437L17.643 20L11.5993 13.9563C10.9484 13.3054 10.9484 12.2501 11.5993 11.5993Z" fill="black"/>
              </svg>
            </div>';
      unset($_SESSION['flash']);
    }
  }
}
<?php
class Flasher {
  public static function setFlash($subject, $type, $msg, $action) {
    $_SESSION['flash'] = [
      'subject' => $subject,
      'type' => $type,
      'msg' => $msg,
      'action' => $action
    ];
  }

  public static function setFlashLogin($action) {
    $_SESSION['flash'] = [
      'action' => $action
    ];
  }

  public static function flash() {
    if (isset($_SESSION['flash'])) {
      echo '<div id="alert" class="alert alert-' . $_SESSION['flash']['type'] . '">
              <p>' . $_SESSION['flash']['subject'] . ' <strong>' . $_SESSION['flash']['msg'] . '</strong> ' . $_SESSION['flash']['action'] . '</p>
              <svg id="close-btn-alert" class="close-btn-alert" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.329505 0.329505C0.768845 -0.109835 1.48116 -0.109835 1.9205 0.329505L7.5 5.90901L13.0795 0.329505C13.5188 -0.109835 14.2312 -0.109835 14.6705 0.329505C15.1098 0.768845 15.1098 1.48116 14.6705 1.9205L9.09099 7.5L14.6705 13.0795C15.1098 13.5188 15.1098 14.2312 14.6705 14.6705C14.2312 15.1098 13.5188 15.1098 13.0795 14.6705L7.5 9.09099L1.9205 14.6705C1.48116 15.1098 0.768845 15.1098 0.329505 14.6705C-0.109835 14.2312 -0.109835 13.5188 0.329505 13.0795L5.90901 7.5L0.329505 1.9205C-0.109835 1.48116 -0.109835 0.768845 0.329505 0.329505Z" fill="#121212"/>
              </svg>
            </div>';
      unset($_SESSION['flash']);
    }
  }

  public static function flashLogin() {
    if (isset($_SESSION['flash'])) {
      echo '<div id="alert" class="alert-login">
              <p><strong>Username</strong> atau <strong>Password</strong> ' . $_SESSION['flash']['action'] . '</p>
            </div>';
      unset($_SESSION['flash']);
    }
  }
}
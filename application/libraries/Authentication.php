<?php
    require __DIR__.'/.././third_party/firebase/vendor/autoload.php';
    require __DIR__.'/.././third_party/jwt/vendor/autoload.php';

    use Kreait\Firebase\Factory;
    use Kreait\Firebase\Exception\Auth\RevokedIdToken;
    use Firebase\Auth\Token\Exception\InvalidToken;
    use Firebase\JWT\JWT;

    class Authentication 
    {
        protected $auth;

        public function __construct()
        {
            $factory = (new Factory)
                ->withServiceAccount(__DIR__.'/.././config/huertoint-firebase-adminsdk-ikhza-b1fa434927.json');

            $this->auth = $factory->createAuth();
        }
            
        public function createUser( $contrasenia, $correo, $nombre ){

            try {
                $newUser = $this->auth
                            ->createUserWithEmailAndPassword( $correo, $contrasenia);

                $response[ "mensaje" ]  = true;
                $response[ "uid" ]      = $newUser->uid;

                $properties = [
                    'displayName' => $nombre
                ];
                
                $updatedUser = $this->auth->updateUser($newUser->uid, $properties);

                return $response;
                
            } catch (\Throwable $th) {
                $response[ "mensaje" ]  = $th->getMessage();
                $response[ "uid" ]      = NULL;

                return $response;
            }
        }

        public function iniciaSesion( $correo, $contrasenia ){

            try {

                $singData = $this->auth
                    ->signInWithEmailAndPassword( $correo, $contrasenia );
                
                return $singData->data();

            } catch (\Throwable $th) {

                return  $th->getMessage();
            }
        }

        public function cierraSesion( $idToken, $uid ){
            
            $this->auth->revokeRefreshTokens($uid);

            try {
                $verifiedIdToken = $this->auth
                    ->verifyIdToken($idToken, $checkIfRevoked = true);
                
                    return true;
            } catch (RevokedIdToken $e) {
                return $e->getMessage();
            }
        }

        public function verificaToken( $idToken ){

            try {
                $verifiedIdToken = $this->auth
                    ->verifyIdToken($idToken);
                return true;
            } catch (InvalidToken $e) {
                return 'The token is invalid: '.$e->getMessage();
            } catch (\InvalidArgumentException $e) {
                return 'The token could not be parsed: '.$e->getMessage();
            }
        }

        public function getUser( $uid ){
            try {
                $user = $this->auth->getUser($uid);
                return $user->displayName;
            } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
                return $e->getMessage();
            }
        }
    }
?>
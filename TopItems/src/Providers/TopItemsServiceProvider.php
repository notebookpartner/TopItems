    <?php
     
    namespace TopItem\Providers;
     
     
    use Plenty\Plugin\ServiceProvider;
     
    class TopItemServiceProvider extends ServiceProvider
    {
     
        /**
         * Register the service provider.
         */
     
        public function register()
        {
			$this->getApplication()->register(TopItemRouteServiceProvider::class);
        }
    }
<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Swift_Attachment;

class SystemController extends Controller {


    /**
     * ABHAYAN IT13076412
     */



    /**
     * Display log panel
     * Can check System's current status with graph. Display all log issues
     */
    public function getLogMain()
    {
        $today = date("F j, Y, g:i a");                              // get date and time
        /*
         * Log - Overview
         */
        $key = '[2015';                                              // key
        $overView = $this->getLog($key);                            // get log entries
        $overViewCount = $this->getCount($key,$this->contents());   // count log entries
        $fileName = 'log-'.date("Y-m-d").'.log';                    // generate auto file name
        $this->writeFile($fileName,$overView);                      // export into a file
        /*
        * Log - Information
        */
        $key = 'local.INFO';                                        // key
        $info = $this->getLog($key);                                // get log entries
        $infoCount = $this->getCount($key,$this->contents());       // count log entries
        /*
        * Log - Error
        */
        $key = 'local.ERROR';                                       // key
        $error = $this->getLog($key);                               // get log entries
        $errorCount = $this->getCount($key,$this->contents());      // count log entries
        /*
        * Log - Warning
        */
        $key = 'local.WARNING';                                     // key
        $warning = $this->getLog($key);                             // get log entries
        $warningCount = $this->getCount($key,$this->contents());    // count log entries
        /*
        * Log - Alert
        */
        $key = 'local.ALERT';                                       // key
        $alert = $this->getLog($key);                               // get log entries
        $alertCount = $this->getCount($key,$this->contents());      // count log entries

        return view('logs.main')->with('today',$today)
            ->with('logOverView',$overView)
            ->with('overViewCount',$overViewCount)
            ->with('logInfo',$info)
            ->with('infoCount',$infoCount)
            ->with('logError',$error)
            ->with('errorCount',$errorCount)
            ->with('logWarning',$warning)
            ->with('warningCount',$warningCount)
            ->with('logAlert',$alert)
            ->with('fieName',$fileName)
            ->with('alertCount',$alertCount);
    }

    /**
     * search, and store all matching occurrences in $matches
     * using regular expressions to make structured log records
     *
     * @parm string $key
     * @return string
     */
    public function getLog($key)
    {
        /*
         * getFormat() => escape special characters in the content
         * contents() => read log file
         */
        if(preg_match_all($this->getFormat($key), $this->contents(), $matches)) // perform a global regular expression match
        {
            $log =  implode('<br>', $matches[0]); // add break in each matches
            return $log;
        }
        else
        {
            $log = "No logs found";
            return $log;
        }
    }

    /**
     * Get logs
     * Read log file
     *
     * @return string
     */
    public function contents()
    {
        // get log file name
        $file = 'laravel-'.date("Y-m-d").'.log';
        // get log path
        $file =  storage_Path().'\logs\/'.$file;
        // get the contents, assuming the file to be readable (and exist)
        $contents = file_get_contents($file);
        // return contents
        return $contents;
    }

    /**
     * Escape special characters in the file
     *
     * @parm string $key
     * @return string
     */
    public function getFormat($key)
    {
        /*
         * escape special characters in the content
         */
        $pattern = preg_quote($key, '/');
        $pattern = "/^.*$pattern.*\$/m";
        return $pattern;

    }

    /**
     * Count no of relevant key issues
     *
     * @parm string $type
     * $parm string $contents
     * @return integer
     */
    public function getCount($type,$contents)
    {
        $lines = preg_split('/\n/', $contents); // Split content by a regular expression [new line]
        $count = 0;                             // Count no of occurrences
        foreach($lines as $line)
        {
            if(stristr($line, $type))           // Returns all of newlines starting from and including the first occurrence of regular expression to the end.
            {
                $count++;                       // increment count
            }
        }
        return $count;
    }

    /**
     * Write logs to a new file
     *
     * @parm string $fileName
     * @parm string $contents
     * @return string
     */
    public function writeFile($fileName,$content)
    {
        $file = 'resources/logs/'.$fileName;    //file path
        $file = fopen($file, "w");              //open file
        $status = fwrite($file, $content);      //write to the file
        fclose($file);
    }

    /**
     * Generate log reports
     *
     * @parm string $type
     */
    public function getLogReport($type)
    {
        $today = date("F j, Y, g:i a");                              // get date and time
        /*
         * Log - Overview
         */
        $key = '[2015';                                              // key
        $overView = $this->getLog($key);                            // get log entries
        $overViewCount = $this->getCount($key,$this->contents());   // count log entries
        $fileName = 'log-'.date("Y-m-d").'.log';                    // export file name
        $this->writeFile($fileName,$overView);                      // export into a file
        /*
        * Log - Information
        */
        $key = 'local.INFO';                                        // key
        $info = $this->getLog($key);                                // get log entries
        $infoCount = $this->getCount($key,$this->contents());       // count log entries
        /*
        * Log - Error
        */
        $key = 'local.ERROR';                                       // key
        $error = $this->getLog($key);                               // get log entries
        $errorCount = $this->getCount($key,$this->contents());      // count log entries
        /*
        * Log - Warning
        */
        $key = 'local.WARNING';                                     // key
        $warning = $this->getLog($key);                             // get log entries
        $warningCount = $this->getCount($key,$this->contents());    // count log entries
        /*
        * Log - Alert
        */
        $key = 'local.ALERT';                                       // key
        $alert = $this->getLog($key);                               // get log entries
        $alertCount = $this->getCount($key,$this->contents());      // count log entries


        return view('logs.report')->with('today',$today)
            ->with('logOverView',$overView)
            ->with('overViewCount',$overViewCount)
            ->with('logInfo',$info)
            ->with('infoCount',$infoCount)
            ->with('logError',$error)
            ->with('errorCount',$errorCount)
            ->with('logWarning',$warning)
            ->with('warningCount',$warningCount)
            ->with('logAlert',$alert)
            ->with('alertCount',$alertCount)
            ->with('type',$type);
    }

    /**
     * Report issues to the maintenance team through email
     */

}

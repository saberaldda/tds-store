/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./node_modules/@firebase/util/dist/index.esm2017.js":
/*!***********************************************************!*\
  !*** ./node_modules/@firebase/util/dist/index.esm2017.js ***!
  \***********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "CONSTANTS": () => (/* binding */ CONSTANTS),
/* harmony export */   "DBWrapper": () => (/* binding */ DBWrapper),
/* harmony export */   "Deferred": () => (/* binding */ Deferred),
/* harmony export */   "ErrorFactory": () => (/* binding */ ErrorFactory),
/* harmony export */   "FirebaseError": () => (/* binding */ FirebaseError),
/* harmony export */   "MAX_VALUE_MILLIS": () => (/* binding */ MAX_VALUE_MILLIS),
/* harmony export */   "RANDOM_FACTOR": () => (/* binding */ RANDOM_FACTOR),
/* harmony export */   "Sha1": () => (/* binding */ Sha1),
/* harmony export */   "areCookiesEnabled": () => (/* binding */ areCookiesEnabled),
/* harmony export */   "assert": () => (/* binding */ assert),
/* harmony export */   "assertionError": () => (/* binding */ assertionError),
/* harmony export */   "async": () => (/* binding */ async),
/* harmony export */   "base64": () => (/* binding */ base64),
/* harmony export */   "base64Decode": () => (/* binding */ base64Decode),
/* harmony export */   "base64Encode": () => (/* binding */ base64Encode),
/* harmony export */   "base64urlEncodeWithoutPadding": () => (/* binding */ base64urlEncodeWithoutPadding),
/* harmony export */   "calculateBackoffMillis": () => (/* binding */ calculateBackoffMillis),
/* harmony export */   "contains": () => (/* binding */ contains),
/* harmony export */   "createMockUserToken": () => (/* binding */ createMockUserToken),
/* harmony export */   "createSubscribe": () => (/* binding */ createSubscribe),
/* harmony export */   "decode": () => (/* binding */ decode),
/* harmony export */   "deepCopy": () => (/* binding */ deepCopy),
/* harmony export */   "deepEqual": () => (/* binding */ deepEqual),
/* harmony export */   "deepExtend": () => (/* binding */ deepExtend),
/* harmony export */   "deleteDB": () => (/* binding */ deleteDB),
/* harmony export */   "errorPrefix": () => (/* binding */ errorPrefix),
/* harmony export */   "extractQuerystring": () => (/* binding */ extractQuerystring),
/* harmony export */   "getGlobal": () => (/* binding */ getGlobal),
/* harmony export */   "getModularInstance": () => (/* binding */ getModularInstance),
/* harmony export */   "getUA": () => (/* binding */ getUA),
/* harmony export */   "isAdmin": () => (/* binding */ isAdmin),
/* harmony export */   "isBrowser": () => (/* binding */ isBrowser),
/* harmony export */   "isBrowserExtension": () => (/* binding */ isBrowserExtension),
/* harmony export */   "isElectron": () => (/* binding */ isElectron),
/* harmony export */   "isEmpty": () => (/* binding */ isEmpty),
/* harmony export */   "isIE": () => (/* binding */ isIE),
/* harmony export */   "isIndexedDBAvailable": () => (/* binding */ isIndexedDBAvailable),
/* harmony export */   "isMobileCordova": () => (/* binding */ isMobileCordova),
/* harmony export */   "isNode": () => (/* binding */ isNode),
/* harmony export */   "isNodeSdk": () => (/* binding */ isNodeSdk),
/* harmony export */   "isReactNative": () => (/* binding */ isReactNative),
/* harmony export */   "isSafari": () => (/* binding */ isSafari),
/* harmony export */   "isUWP": () => (/* binding */ isUWP),
/* harmony export */   "isValidFormat": () => (/* binding */ isValidFormat),
/* harmony export */   "isValidTimestamp": () => (/* binding */ isValidTimestamp),
/* harmony export */   "issuedAtTime": () => (/* binding */ issuedAtTime),
/* harmony export */   "jsonEval": () => (/* binding */ jsonEval),
/* harmony export */   "map": () => (/* binding */ map),
/* harmony export */   "openDB": () => (/* binding */ openDB),
/* harmony export */   "ordinal": () => (/* binding */ ordinal),
/* harmony export */   "querystring": () => (/* binding */ querystring),
/* harmony export */   "querystringDecode": () => (/* binding */ querystringDecode),
/* harmony export */   "safeGet": () => (/* binding */ safeGet),
/* harmony export */   "stringLength": () => (/* binding */ stringLength),
/* harmony export */   "stringToByteArray": () => (/* binding */ stringToByteArray),
/* harmony export */   "stringify": () => (/* binding */ stringify),
/* harmony export */   "validateArgCount": () => (/* binding */ validateArgCount),
/* harmony export */   "validateCallback": () => (/* binding */ validateCallback),
/* harmony export */   "validateContextObject": () => (/* binding */ validateContextObject),
/* harmony export */   "validateIndexedDBOpenable": () => (/* binding */ validateIndexedDBOpenable),
/* harmony export */   "validateNamespace": () => (/* binding */ validateNamespace)
/* harmony export */ });
/**
 * @license
 * Copyright 2017 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
/**
 * @fileoverview Firebase constants.  Some of these (@defines) can be overridden at compile-time.
 */
const CONSTANTS = {
    /**
     * @define {boolean} Whether this is the client Node.js SDK.
     */
    NODE_CLIENT: false,
    /**
     * @define {boolean} Whether this is the Admin Node.js SDK.
     */
    NODE_ADMIN: false,
    /**
     * Firebase SDK Version
     */
    SDK_VERSION: '${JSCORE_VERSION}'
};

/**
 * @license
 * Copyright 2017 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
/**
 * Throws an error if the provided assertion is falsy
 */
const assert = function (assertion, message) {
    if (!assertion) {
        throw assertionError(message);
    }
};
/**
 * Returns an Error object suitable for throwing.
 */
const assertionError = function (message) {
    return new Error('Firebase Database (' +
        CONSTANTS.SDK_VERSION +
        ') INTERNAL ASSERT FAILED: ' +
        message);
};

/**
 * @license
 * Copyright 2017 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
const stringToByteArray$1 = function (str) {
    // TODO(user): Use native implementations if/when available
    const out = [];
    let p = 0;
    for (let i = 0; i < str.length; i++) {
        let c = str.charCodeAt(i);
        if (c < 128) {
            out[p++] = c;
        }
        else if (c < 2048) {
            out[p++] = (c >> 6) | 192;
            out[p++] = (c & 63) | 128;
        }
        else if ((c & 0xfc00) === 0xd800 &&
            i + 1 < str.length &&
            (str.charCodeAt(i + 1) & 0xfc00) === 0xdc00) {
            // Surrogate Pair
            c = 0x10000 + ((c & 0x03ff) << 10) + (str.charCodeAt(++i) & 0x03ff);
            out[p++] = (c >> 18) | 240;
            out[p++] = ((c >> 12) & 63) | 128;
            out[p++] = ((c >> 6) & 63) | 128;
            out[p++] = (c & 63) | 128;
        }
        else {
            out[p++] = (c >> 12) | 224;
            out[p++] = ((c >> 6) & 63) | 128;
            out[p++] = (c & 63) | 128;
        }
    }
    return out;
};
/**
 * Turns an array of numbers into the string given by the concatenation of the
 * characters to which the numbers correspond.
 * @param bytes Array of numbers representing characters.
 * @return Stringification of the array.
 */
const byteArrayToString = function (bytes) {
    // TODO(user): Use native implementations if/when available
    const out = [];
    let pos = 0, c = 0;
    while (pos < bytes.length) {
        const c1 = bytes[pos++];
        if (c1 < 128) {
            out[c++] = String.fromCharCode(c1);
        }
        else if (c1 > 191 && c1 < 224) {
            const c2 = bytes[pos++];
            out[c++] = String.fromCharCode(((c1 & 31) << 6) | (c2 & 63));
        }
        else if (c1 > 239 && c1 < 365) {
            // Surrogate Pair
            const c2 = bytes[pos++];
            const c3 = bytes[pos++];
            const c4 = bytes[pos++];
            const u = (((c1 & 7) << 18) | ((c2 & 63) << 12) | ((c3 & 63) << 6) | (c4 & 63)) -
                0x10000;
            out[c++] = String.fromCharCode(0xd800 + (u >> 10));
            out[c++] = String.fromCharCode(0xdc00 + (u & 1023));
        }
        else {
            const c2 = bytes[pos++];
            const c3 = bytes[pos++];
            out[c++] = String.fromCharCode(((c1 & 15) << 12) | ((c2 & 63) << 6) | (c3 & 63));
        }
    }
    return out.join('');
};
// We define it as an object literal instead of a class because a class compiled down to es5 can't
// be treeshaked. https://github.com/rollup/rollup/issues/1691
// Static lookup maps, lazily populated by init_()
const base64 = {
    /**
     * Maps bytes to characters.
     */
    byteToCharMap_: null,
    /**
     * Maps characters to bytes.
     */
    charToByteMap_: null,
    /**
     * Maps bytes to websafe characters.
     * @private
     */
    byteToCharMapWebSafe_: null,
    /**
     * Maps websafe characters to bytes.
     * @private
     */
    charToByteMapWebSafe_: null,
    /**
     * Our default alphabet, shared between
     * ENCODED_VALS and ENCODED_VALS_WEBSAFE
     */
    ENCODED_VALS_BASE: 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' + 'abcdefghijklmnopqrstuvwxyz' + '0123456789',
    /**
     * Our default alphabet. Value 64 (=) is special; it means "nothing."
     */
    get ENCODED_VALS() {
        return this.ENCODED_VALS_BASE + '+/=';
    },
    /**
     * Our websafe alphabet.
     */
    get ENCODED_VALS_WEBSAFE() {
        return this.ENCODED_VALS_BASE + '-_.';
    },
    /**
     * Whether this browser supports the atob and btoa functions. This extension
     * started at Mozilla but is now implemented by many browsers. We use the
     * ASSUME_* variables to avoid pulling in the full useragent detection library
     * but still allowing the standard per-browser compilations.
     *
     */
    HAS_NATIVE_SUPPORT: typeof atob === 'function',
    /**
     * Base64-encode an array of bytes.
     *
     * @param input An array of bytes (numbers with
     *     value in [0, 255]) to encode.
     * @param webSafe Boolean indicating we should use the
     *     alternative alphabet.
     * @return The base64 encoded string.
     */
    encodeByteArray(input, webSafe) {
        if (!Array.isArray(input)) {
            throw Error('encodeByteArray takes an array as a parameter');
        }
        this.init_();
        const byteToCharMap = webSafe
            ? this.byteToCharMapWebSafe_
            : this.byteToCharMap_;
        const output = [];
        for (let i = 0; i < input.length; i += 3) {
            const byte1 = input[i];
            const haveByte2 = i + 1 < input.length;
            const byte2 = haveByte2 ? input[i + 1] : 0;
            const haveByte3 = i + 2 < input.length;
            const byte3 = haveByte3 ? input[i + 2] : 0;
            const outByte1 = byte1 >> 2;
            const outByte2 = ((byte1 & 0x03) << 4) | (byte2 >> 4);
            let outByte3 = ((byte2 & 0x0f) << 2) | (byte3 >> 6);
            let outByte4 = byte3 & 0x3f;
            if (!haveByte3) {
                outByte4 = 64;
                if (!haveByte2) {
                    outByte3 = 64;
                }
            }
            output.push(byteToCharMap[outByte1], byteToCharMap[outByte2], byteToCharMap[outByte3], byteToCharMap[outByte4]);
        }
        return output.join('');
    },
    /**
     * Base64-encode a string.
     *
     * @param input A string to encode.
     * @param webSafe If true, we should use the
     *     alternative alphabet.
     * @return The base64 encoded string.
     */
    encodeString(input, webSafe) {
        // Shortcut for Mozilla browsers that implement
        // a native base64 encoder in the form of "btoa/atob"
        if (this.HAS_NATIVE_SUPPORT && !webSafe) {
            return btoa(input);
        }
        return this.encodeByteArray(stringToByteArray$1(input), webSafe);
    },
    /**
     * Base64-decode a string.
     *
     * @param input to decode.
     * @param webSafe True if we should use the
     *     alternative alphabet.
     * @return string representing the decoded value.
     */
    decodeString(input, webSafe) {
        // Shortcut for Mozilla browsers that implement
        // a native base64 encoder in the form of "btoa/atob"
        if (this.HAS_NATIVE_SUPPORT && !webSafe) {
            return atob(input);
        }
        return byteArrayToString(this.decodeStringToByteArray(input, webSafe));
    },
    /**
     * Base64-decode a string.
     *
     * In base-64 decoding, groups of four characters are converted into three
     * bytes.  If the encoder did not apply padding, the input length may not
     * be a multiple of 4.
     *
     * In this case, the last group will have fewer than 4 characters, and
     * padding will be inferred.  If the group has one or two characters, it decodes
     * to one byte.  If the group has three characters, it decodes to two bytes.
     *
     * @param input Input to decode.
     * @param webSafe True if we should use the web-safe alphabet.
     * @return bytes representing the decoded value.
     */
    decodeStringToByteArray(input, webSafe) {
        this.init_();
        const charToByteMap = webSafe
            ? this.charToByteMapWebSafe_
            : this.charToByteMap_;
        const output = [];
        for (let i = 0; i < input.length;) {
            const byte1 = charToByteMap[input.charAt(i++)];
            const haveByte2 = i < input.length;
            const byte2 = haveByte2 ? charToByteMap[input.charAt(i)] : 0;
            ++i;
            const haveByte3 = i < input.length;
            const byte3 = haveByte3 ? charToByteMap[input.charAt(i)] : 64;
            ++i;
            const haveByte4 = i < input.length;
            const byte4 = haveByte4 ? charToByteMap[input.charAt(i)] : 64;
            ++i;
            if (byte1 == null || byte2 == null || byte3 == null || byte4 == null) {
                throw Error();
            }
            const outByte1 = (byte1 << 2) | (byte2 >> 4);
            output.push(outByte1);
            if (byte3 !== 64) {
                const outByte2 = ((byte2 << 4) & 0xf0) | (byte3 >> 2);
                output.push(outByte2);
                if (byte4 !== 64) {
                    const outByte3 = ((byte3 << 6) & 0xc0) | byte4;
                    output.push(outByte3);
                }
            }
        }
        return output;
    },
    /**
     * Lazy static initialization function. Called before
     * accessing any of the static map variables.
     * @private
     */
    init_() {
        if (!this.byteToCharMap_) {
            this.byteToCharMap_ = {};
            this.charToByteMap_ = {};
            this.byteToCharMapWebSafe_ = {};
            this.charToByteMapWebSafe_ = {};
            // We want quick mappings back and forth, so we precompute two maps.
            for (let i = 0; i < this.ENCODED_VALS.length; i++) {
                this.byteToCharMap_[i] = this.ENCODED_VALS.charAt(i);
                this.charToByteMap_[this.byteToCharMap_[i]] = i;
                this.byteToCharMapWebSafe_[i] = this.ENCODED_VALS_WEBSAFE.charAt(i);
                this.charToByteMapWebSafe_[this.byteToCharMapWebSafe_[i]] = i;
                // Be forgiving when decoding and correctly decode both encodings.
                if (i >= this.ENCODED_VALS_BASE.length) {
                    this.charToByteMap_[this.ENCODED_VALS_WEBSAFE.charAt(i)] = i;
                    this.charToByteMapWebSafe_[this.ENCODED_VALS.charAt(i)] = i;
                }
            }
        }
    }
};
/**
 * URL-safe base64 encoding
 */
const base64Encode = function (str) {
    const utf8Bytes = stringToByteArray$1(str);
    return base64.encodeByteArray(utf8Bytes, true);
};
/**
 * URL-safe base64 encoding (without "." padding in the end).
 * e.g. Used in JSON Web Token (JWT) parts.
 */
const base64urlEncodeWithoutPadding = function (str) {
    // Use base64url encoding and remove padding in the end (dot characters).
    return base64Encode(str).replace(/\./g, '');
};
/**
 * URL-safe base64 decoding
 *
 * NOTE: DO NOT use the global atob() function - it does NOT support the
 * base64Url variant encoding.
 *
 * @param str To be decoded
 * @return Decoded result, if possible
 */
const base64Decode = function (str) {
    try {
        return base64.decodeString(str, true);
    }
    catch (e) {
        console.error('base64Decode failed: ', e);
    }
    return null;
};

/**
 * @license
 * Copyright 2017 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
/**
 * Do a deep-copy of basic JavaScript Objects or Arrays.
 */
function deepCopy(value) {
    return deepExtend(undefined, value);
}
/**
 * Copy properties from source to target (recursively allows extension
 * of Objects and Arrays).  Scalar values in the target are over-written.
 * If target is undefined, an object of the appropriate type will be created
 * (and returned).
 *
 * We recursively copy all child properties of plain Objects in the source- so
 * that namespace- like dictionaries are merged.
 *
 * Note that the target can be a function, in which case the properties in
 * the source Object are copied onto it as static properties of the Function.
 *
 * Note: we don't merge __proto__ to prevent prototype pollution
 */
function deepExtend(target, source) {
    if (!(source instanceof Object)) {
        return source;
    }
    switch (source.constructor) {
        case Date:
            // Treat Dates like scalars; if the target date object had any child
            // properties - they will be lost!
            const dateValue = source;
            return new Date(dateValue.getTime());
        case Object:
            if (target === undefined) {
                target = {};
            }
            break;
        case Array:
            // Always copy the array source and overwrite the target.
            target = [];
            break;
        default:
            // Not a plain Object - treat it as a scalar.
            return source;
    }
    for (const prop in source) {
        // use isValidKey to guard against prototype pollution. See https://snyk.io/vuln/SNYK-JS-LODASH-450202
        if (!source.hasOwnProperty(prop) || !isValidKey(prop)) {
            continue;
        }
        target[prop] = deepExtend(target[prop], source[prop]);
    }
    return target;
}
function isValidKey(key) {
    return key !== '__proto__';
}

/**
 * @license
 * Copyright 2017 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
class Deferred {
    constructor() {
        this.reject = () => { };
        this.resolve = () => { };
        this.promise = new Promise((resolve, reject) => {
            this.resolve = resolve;
            this.reject = reject;
        });
    }
    /**
     * Our API internals are not promiseified and cannot because our callback APIs have subtle expectations around
     * invoking promises inline, which Promises are forbidden to do. This method accepts an optional node-style callback
     * and returns a node-style callback which will resolve or reject the Deferred's promise.
     */
    wrapCallback(callback) {
        return (error, value) => {
            if (error) {
                this.reject(error);
            }
            else {
                this.resolve(value);
            }
            if (typeof callback === 'function') {
                // Attaching noop handler just in case developer wasn't expecting
                // promises
                this.promise.catch(() => { });
                // Some of our callbacks don't expect a value and our own tests
                // assert that the parameter length is 1
                if (callback.length === 1) {
                    callback(error);
                }
                else {
                    callback(error, value);
                }
            }
        };
    }
}

/**
 * @license
 * Copyright 2021 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
function createMockUserToken(token, projectId) {
    if (token.uid) {
        throw new Error('The "uid" field is no longer supported by mockUserToken. Please use "sub" instead for Firebase Auth User ID.');
    }
    // Unsecured JWTs use "none" as the algorithm.
    const header = {
        alg: 'none',
        type: 'JWT'
    };
    const project = projectId || 'demo-project';
    const iat = token.iat || 0;
    const sub = token.sub || token.user_id;
    if (!sub) {
        throw new Error("mockUserToken must contain 'sub' or 'user_id' field!");
    }
    const payload = Object.assign({ 
        // Set all required fields to decent defaults
        iss: `https://securetoken.google.com/${project}`, aud: project, iat, exp: iat + 3600, auth_time: iat, sub, user_id: sub, firebase: {
            sign_in_provider: 'custom',
            identities: {}
        } }, token);
    // Unsecured JWTs use the empty string as a signature.
    const signature = '';
    return [
        base64urlEncodeWithoutPadding(JSON.stringify(header)),
        base64urlEncodeWithoutPadding(JSON.stringify(payload)),
        signature
    ].join('.');
}

/**
 * @license
 * Copyright 2017 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
/**
 * Returns navigator.userAgent string or '' if it's not defined.
 * @return user agent string
 */
function getUA() {
    if (typeof navigator !== 'undefined' &&
        typeof navigator['userAgent'] === 'string') {
        return navigator['userAgent'];
    }
    else {
        return '';
    }
}
/**
 * Detect Cordova / PhoneGap / Ionic frameworks on a mobile device.
 *
 * Deliberately does not rely on checking `file://` URLs (as this fails PhoneGap
 * in the Ripple emulator) nor Cordova `onDeviceReady`, which would normally
 * wait for a callback.
 */
function isMobileCordova() {
    return (typeof window !== 'undefined' &&
        // @ts-ignore Setting up an broadly applicable index signature for Window
        // just to deal with this case would probably be a bad idea.
        !!(window['cordova'] || window['phonegap'] || window['PhoneGap']) &&
        /ios|iphone|ipod|ipad|android|blackberry|iemobile/i.test(getUA()));
}
/**
 * Detect Node.js.
 *
 * @return true if Node.js environment is detected.
 */
// Node detection logic from: https://github.com/iliakan/detect-node/
function isNode() {
    try {
        return (Object.prototype.toString.call(__webpack_require__.g.process) === '[object process]');
    }
    catch (e) {
        return false;
    }
}
/**
 * Detect Browser Environment
 */
function isBrowser() {
    return typeof self === 'object' && self.self === self;
}
function isBrowserExtension() {
    const runtime = typeof chrome === 'object'
        ? chrome.runtime
        : typeof browser === 'object'
            ? browser.runtime
            : undefined;
    return typeof runtime === 'object' && runtime.id !== undefined;
}
/**
 * Detect React Native.
 *
 * @return true if ReactNative environment is detected.
 */
function isReactNative() {
    return (typeof navigator === 'object' && navigator['product'] === 'ReactNative');
}
/** Detects Electron apps. */
function isElectron() {
    return getUA().indexOf('Electron/') >= 0;
}
/** Detects Internet Explorer. */
function isIE() {
    const ua = getUA();
    return ua.indexOf('MSIE ') >= 0 || ua.indexOf('Trident/') >= 0;
}
/** Detects Universal Windows Platform apps. */
function isUWP() {
    return getUA().indexOf('MSAppHost/') >= 0;
}
/**
 * Detect whether the current SDK build is the Node version.
 *
 * @return true if it's the Node SDK build.
 */
function isNodeSdk() {
    return CONSTANTS.NODE_CLIENT === true || CONSTANTS.NODE_ADMIN === true;
}
/** Returns true if we are running in Safari. */
function isSafari() {
    return (!isNode() &&
        navigator.userAgent.includes('Safari') &&
        !navigator.userAgent.includes('Chrome'));
}
/**
 * This method checks if indexedDB is supported by current browser/service worker context
 * @return true if indexedDB is supported by current browser/service worker context
 */
function isIndexedDBAvailable() {
    return typeof indexedDB === 'object';
}
/**
 * This method validates browser/sw context for indexedDB by opening a dummy indexedDB database and reject
 * if errors occur during the database open operation.
 *
 * @throws exception if current browser/sw context can't run idb.open (ex: Safari iframe, Firefox
 * private browsing)
 */
function validateIndexedDBOpenable() {
    return new Promise((resolve, reject) => {
        try {
            let preExist = true;
            const DB_CHECK_NAME = 'validate-browser-context-for-indexeddb-analytics-module';
            const request = self.indexedDB.open(DB_CHECK_NAME);
            request.onsuccess = () => {
                request.result.close();
                // delete database only when it doesn't pre-exist
                if (!preExist) {
                    self.indexedDB.deleteDatabase(DB_CHECK_NAME);
                }
                resolve(true);
            };
            request.onupgradeneeded = () => {
                preExist = false;
            };
            request.onerror = () => {
                var _a;
                reject(((_a = request.error) === null || _a === void 0 ? void 0 : _a.message) || '');
            };
        }
        catch (error) {
            reject(error);
        }
    });
}
/**
 *
 * This method checks whether cookie is enabled within current browser
 * @return true if cookie is enabled within current browser
 */
function areCookiesEnabled() {
    if (typeof navigator === 'undefined' || !navigator.cookieEnabled) {
        return false;
    }
    return true;
}
/**
 * Polyfill for `globalThis` object.
 * @returns the `globalThis` object for the given environment.
 */
function getGlobal() {
    if (typeof self !== 'undefined') {
        return self;
    }
    if (typeof window !== 'undefined') {
        return window;
    }
    if (typeof __webpack_require__.g !== 'undefined') {
        return __webpack_require__.g;
    }
    throw new Error('Unable to locate global object.');
}

/**
 * @license
 * Copyright 2017 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
/**
 * @fileoverview Standardized Firebase Error.
 *
 * Usage:
 *
 *   // Typescript string literals for type-safe codes
 *   type Err =
 *     'unknown' |
 *     'object-not-found'
 *     ;
 *
 *   // Closure enum for type-safe error codes
 *   // at-enum {string}
 *   var Err = {
 *     UNKNOWN: 'unknown',
 *     OBJECT_NOT_FOUND: 'object-not-found',
 *   }
 *
 *   let errors: Map<Err, string> = {
 *     'generic-error': "Unknown error",
 *     'file-not-found': "Could not find file: {$file}",
 *   };
 *
 *   // Type-safe function - must pass a valid error code as param.
 *   let error = new ErrorFactory<Err>('service', 'Service', errors);
 *
 *   ...
 *   throw error.create(Err.GENERIC);
 *   ...
 *   throw error.create(Err.FILE_NOT_FOUND, {'file': fileName});
 *   ...
 *   // Service: Could not file file: foo.txt (service/file-not-found).
 *
 *   catch (e) {
 *     assert(e.message === "Could not find file: foo.txt.");
 *     if (e.code === 'service/file-not-found') {
 *       console.log("Could not read file: " + e['file']);
 *     }
 *   }
 */
const ERROR_NAME = 'FirebaseError';
// Based on code from:
// https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Error#Custom_Error_Types
class FirebaseError extends Error {
    constructor(
    /** The error code for this error. */
    code, message, 
    /** Custom data for this error. */
    customData) {
        super(message);
        this.code = code;
        this.customData = customData;
        /** The custom name for all FirebaseErrors. */
        this.name = ERROR_NAME;
        // Fix For ES5
        // https://github.com/Microsoft/TypeScript-wiki/blob/master/Breaking-Changes.md#extending-built-ins-like-error-array-and-map-may-no-longer-work
        Object.setPrototypeOf(this, FirebaseError.prototype);
        // Maintains proper stack trace for where our error was thrown.
        // Only available on V8.
        if (Error.captureStackTrace) {
            Error.captureStackTrace(this, ErrorFactory.prototype.create);
        }
    }
}
class ErrorFactory {
    constructor(service, serviceName, errors) {
        this.service = service;
        this.serviceName = serviceName;
        this.errors = errors;
    }
    create(code, ...data) {
        const customData = data[0] || {};
        const fullCode = `${this.service}/${code}`;
        const template = this.errors[code];
        const message = template ? replaceTemplate(template, customData) : 'Error';
        // Service Name: Error message (service/code).
        const fullMessage = `${this.serviceName}: ${message} (${fullCode}).`;
        const error = new FirebaseError(fullCode, fullMessage, customData);
        return error;
    }
}
function replaceTemplate(template, data) {
    return template.replace(PATTERN, (_, key) => {
        const value = data[key];
        return value != null ? String(value) : `<${key}?>`;
    });
}
const PATTERN = /\{\$([^}]+)}/g;

/**
 * @license
 * Copyright 2017 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
/**
 * Evaluates a JSON string into a javascript object.
 *
 * @param {string} str A string containing JSON.
 * @return {*} The javascript object representing the specified JSON.
 */
function jsonEval(str) {
    return JSON.parse(str);
}
/**
 * Returns JSON representing a javascript object.
 * @param {*} data Javascript object to be stringified.
 * @return {string} The JSON contents of the object.
 */
function stringify(data) {
    return JSON.stringify(data);
}

/**
 * @license
 * Copyright 2017 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
/**
 * Decodes a Firebase auth. token into constituent parts.
 *
 * Notes:
 * - May return with invalid / incomplete claims if there's no native base64 decoding support.
 * - Doesn't check if the token is actually valid.
 */
const decode = function (token) {
    let header = {}, claims = {}, data = {}, signature = '';
    try {
        const parts = token.split('.');
        header = jsonEval(base64Decode(parts[0]) || '');
        claims = jsonEval(base64Decode(parts[1]) || '');
        signature = parts[2];
        data = claims['d'] || {};
        delete claims['d'];
    }
    catch (e) { }
    return {
        header,
        claims,
        data,
        signature
    };
};
/**
 * Decodes a Firebase auth. token and checks the validity of its time-based claims. Will return true if the
 * token is within the time window authorized by the 'nbf' (not-before) and 'iat' (issued-at) claims.
 *
 * Notes:
 * - May return a false negative if there's no native base64 decoding support.
 * - Doesn't check if the token is actually valid.
 */
const isValidTimestamp = function (token) {
    const claims = decode(token).claims;
    const now = Math.floor(new Date().getTime() / 1000);
    let validSince = 0, validUntil = 0;
    if (typeof claims === 'object') {
        if (claims.hasOwnProperty('nbf')) {
            validSince = claims['nbf'];
        }
        else if (claims.hasOwnProperty('iat')) {
            validSince = claims['iat'];
        }
        if (claims.hasOwnProperty('exp')) {
            validUntil = claims['exp'];
        }
        else {
            // token will expire after 24h by default
            validUntil = validSince + 86400;
        }
    }
    return (!!now &&
        !!validSince &&
        !!validUntil &&
        now >= validSince &&
        now <= validUntil);
};
/**
 * Decodes a Firebase auth. token and returns its issued at time if valid, null otherwise.
 *
 * Notes:
 * - May return null if there's no native base64 decoding support.
 * - Doesn't check if the token is actually valid.
 */
const issuedAtTime = function (token) {
    const claims = decode(token).claims;
    if (typeof claims === 'object' && claims.hasOwnProperty('iat')) {
        return claims['iat'];
    }
    return null;
};
/**
 * Decodes a Firebase auth. token and checks the validity of its format. Expects a valid issued-at time.
 *
 * Notes:
 * - May return a false negative if there's no native base64 decoding support.
 * - Doesn't check if the token is actually valid.
 */
const isValidFormat = function (token) {
    const decoded = decode(token), claims = decoded.claims;
    return !!claims && typeof claims === 'object' && claims.hasOwnProperty('iat');
};
/**
 * Attempts to peer into an auth token and determine if it's an admin auth token by looking at the claims portion.
 *
 * Notes:
 * - May return a false negative if there's no native base64 decoding support.
 * - Doesn't check if the token is actually valid.
 */
const isAdmin = function (token) {
    const claims = decode(token).claims;
    return typeof claims === 'object' && claims['admin'] === true;
};

/**
 * @license
 * Copyright 2017 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
function contains(obj, key) {
    return Object.prototype.hasOwnProperty.call(obj, key);
}
function safeGet(obj, key) {
    if (Object.prototype.hasOwnProperty.call(obj, key)) {
        return obj[key];
    }
    else {
        return undefined;
    }
}
function isEmpty(obj) {
    for (const key in obj) {
        if (Object.prototype.hasOwnProperty.call(obj, key)) {
            return false;
        }
    }
    return true;
}
function map(obj, fn, contextObj) {
    const res = {};
    for (const key in obj) {
        if (Object.prototype.hasOwnProperty.call(obj, key)) {
            res[key] = fn.call(contextObj, obj[key], key, obj);
        }
    }
    return res;
}
/**
 * Deep equal two objects. Support Arrays and Objects.
 */
function deepEqual(a, b) {
    if (a === b) {
        return true;
    }
    const aKeys = Object.keys(a);
    const bKeys = Object.keys(b);
    for (const k of aKeys) {
        if (!bKeys.includes(k)) {
            return false;
        }
        const aProp = a[k];
        const bProp = b[k];
        if (isObject(aProp) && isObject(bProp)) {
            if (!deepEqual(aProp, bProp)) {
                return false;
            }
        }
        else if (aProp !== bProp) {
            return false;
        }
    }
    for (const k of bKeys) {
        if (!aKeys.includes(k)) {
            return false;
        }
    }
    return true;
}
function isObject(thing) {
    return thing !== null && typeof thing === 'object';
}

/**
 * @license
 * Copyright 2017 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
/**
 * Returns a querystring-formatted string (e.g. &arg=val&arg2=val2) from a
 * params object (e.g. {arg: 'val', arg2: 'val2'})
 * Note: You must prepend it with ? when adding it to a URL.
 */
function querystring(querystringParams) {
    const params = [];
    for (const [key, value] of Object.entries(querystringParams)) {
        if (Array.isArray(value)) {
            value.forEach(arrayVal => {
                params.push(encodeURIComponent(key) + '=' + encodeURIComponent(arrayVal));
            });
        }
        else {
            params.push(encodeURIComponent(key) + '=' + encodeURIComponent(value));
        }
    }
    return params.length ? '&' + params.join('&') : '';
}
/**
 * Decodes a querystring (e.g. ?arg=val&arg2=val2) into a params object
 * (e.g. {arg: 'val', arg2: 'val2'})
 */
function querystringDecode(querystring) {
    const obj = {};
    const tokens = querystring.replace(/^\?/, '').split('&');
    tokens.forEach(token => {
        if (token) {
            const [key, value] = token.split('=');
            obj[decodeURIComponent(key)] = decodeURIComponent(value);
        }
    });
    return obj;
}
/**
 * Extract the query string part of a URL, including the leading question mark (if present).
 */
function extractQuerystring(url) {
    const queryStart = url.indexOf('?');
    if (!queryStart) {
        return '';
    }
    const fragmentStart = url.indexOf('#', queryStart);
    return url.substring(queryStart, fragmentStart > 0 ? fragmentStart : undefined);
}

/**
 * @license
 * Copyright 2017 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
/**
 * @fileoverview SHA-1 cryptographic hash.
 * Variable names follow the notation in FIPS PUB 180-3:
 * http://csrc.nist.gov/publications/fips/fips180-3/fips180-3_final.pdf.
 *
 * Usage:
 *   var sha1 = new sha1();
 *   sha1.update(bytes);
 *   var hash = sha1.digest();
 *
 * Performance:
 *   Chrome 23:   ~400 Mbit/s
 *   Firefox 16:  ~250 Mbit/s
 *
 */
/**
 * SHA-1 cryptographic hash constructor.
 *
 * The properties declared here are discussed in the above algorithm document.
 * @constructor
 * @final
 * @struct
 */
class Sha1 {
    constructor() {
        /**
         * Holds the previous values of accumulated variables a-e in the compress_
         * function.
         * @private
         */
        this.chain_ = [];
        /**
         * A buffer holding the partially computed hash result.
         * @private
         */
        this.buf_ = [];
        /**
         * An array of 80 bytes, each a part of the message to be hashed.  Referred to
         * as the message schedule in the docs.
         * @private
         */
        this.W_ = [];
        /**
         * Contains data needed to pad messages less than 64 bytes.
         * @private
         */
        this.pad_ = [];
        /**
         * @private {number}
         */
        this.inbuf_ = 0;
        /**
         * @private {number}
         */
        this.total_ = 0;
        this.blockSize = 512 / 8;
        this.pad_[0] = 128;
        for (let i = 1; i < this.blockSize; ++i) {
            this.pad_[i] = 0;
        }
        this.reset();
    }
    reset() {
        this.chain_[0] = 0x67452301;
        this.chain_[1] = 0xefcdab89;
        this.chain_[2] = 0x98badcfe;
        this.chain_[3] = 0x10325476;
        this.chain_[4] = 0xc3d2e1f0;
        this.inbuf_ = 0;
        this.total_ = 0;
    }
    /**
     * Internal compress helper function.
     * @param buf Block to compress.
     * @param offset Offset of the block in the buffer.
     * @private
     */
    compress_(buf, offset) {
        if (!offset) {
            offset = 0;
        }
        const W = this.W_;
        // get 16 big endian words
        if (typeof buf === 'string') {
            for (let i = 0; i < 16; i++) {
                // TODO(user): [bug 8140122] Recent versions of Safari for Mac OS and iOS
                // have a bug that turns the post-increment ++ operator into pre-increment
                // during JIT compilation.  We have code that depends heavily on SHA-1 for
                // correctness and which is affected by this bug, so I've removed all uses
                // of post-increment ++ in which the result value is used.  We can revert
                // this change once the Safari bug
                // (https://bugs.webkit.org/show_bug.cgi?id=109036) has been fixed and
                // most clients have been updated.
                W[i] =
                    (buf.charCodeAt(offset) << 24) |
                        (buf.charCodeAt(offset + 1) << 16) |
                        (buf.charCodeAt(offset + 2) << 8) |
                        buf.charCodeAt(offset + 3);
                offset += 4;
            }
        }
        else {
            for (let i = 0; i < 16; i++) {
                W[i] =
                    (buf[offset] << 24) |
                        (buf[offset + 1] << 16) |
                        (buf[offset + 2] << 8) |
                        buf[offset + 3];
                offset += 4;
            }
        }
        // expand to 80 words
        for (let i = 16; i < 80; i++) {
            const t = W[i - 3] ^ W[i - 8] ^ W[i - 14] ^ W[i - 16];
            W[i] = ((t << 1) | (t >>> 31)) & 0xffffffff;
        }
        let a = this.chain_[0];
        let b = this.chain_[1];
        let c = this.chain_[2];
        let d = this.chain_[3];
        let e = this.chain_[4];
        let f, k;
        // TODO(user): Try to unroll this loop to speed up the computation.
        for (let i = 0; i < 80; i++) {
            if (i < 40) {
                if (i < 20) {
                    f = d ^ (b & (c ^ d));
                    k = 0x5a827999;
                }
                else {
                    f = b ^ c ^ d;
                    k = 0x6ed9eba1;
                }
            }
            else {
                if (i < 60) {
                    f = (b & c) | (d & (b | c));
                    k = 0x8f1bbcdc;
                }
                else {
                    f = b ^ c ^ d;
                    k = 0xca62c1d6;
                }
            }
            const t = (((a << 5) | (a >>> 27)) + f + e + k + W[i]) & 0xffffffff;
            e = d;
            d = c;
            c = ((b << 30) | (b >>> 2)) & 0xffffffff;
            b = a;
            a = t;
        }
        this.chain_[0] = (this.chain_[0] + a) & 0xffffffff;
        this.chain_[1] = (this.chain_[1] + b) & 0xffffffff;
        this.chain_[2] = (this.chain_[2] + c) & 0xffffffff;
        this.chain_[3] = (this.chain_[3] + d) & 0xffffffff;
        this.chain_[4] = (this.chain_[4] + e) & 0xffffffff;
    }
    update(bytes, length) {
        // TODO(johnlenz): tighten the function signature and remove this check
        if (bytes == null) {
            return;
        }
        if (length === undefined) {
            length = bytes.length;
        }
        const lengthMinusBlock = length - this.blockSize;
        let n = 0;
        // Using local instead of member variables gives ~5% speedup on Firefox 16.
        const buf = this.buf_;
        let inbuf = this.inbuf_;
        // The outer while loop should execute at most twice.
        while (n < length) {
            // When we have no data in the block to top up, we can directly process the
            // input buffer (assuming it contains sufficient data). This gives ~25%
            // speedup on Chrome 23 and ~15% speedup on Firefox 16, but requires that
            // the data is provided in large chunks (or in multiples of 64 bytes).
            if (inbuf === 0) {
                while (n <= lengthMinusBlock) {
                    this.compress_(bytes, n);
                    n += this.blockSize;
                }
            }
            if (typeof bytes === 'string') {
                while (n < length) {
                    buf[inbuf] = bytes.charCodeAt(n);
                    ++inbuf;
                    ++n;
                    if (inbuf === this.blockSize) {
                        this.compress_(buf);
                        inbuf = 0;
                        // Jump to the outer loop so we use the full-block optimization.
                        break;
                    }
                }
            }
            else {
                while (n < length) {
                    buf[inbuf] = bytes[n];
                    ++inbuf;
                    ++n;
                    if (inbuf === this.blockSize) {
                        this.compress_(buf);
                        inbuf = 0;
                        // Jump to the outer loop so we use the full-block optimization.
                        break;
                    }
                }
            }
        }
        this.inbuf_ = inbuf;
        this.total_ += length;
    }
    /** @override */
    digest() {
        const digest = [];
        let totalBits = this.total_ * 8;
        // Add pad 0x80 0x00*.
        if (this.inbuf_ < 56) {
            this.update(this.pad_, 56 - this.inbuf_);
        }
        else {
            this.update(this.pad_, this.blockSize - (this.inbuf_ - 56));
        }
        // Add # bits.
        for (let i = this.blockSize - 1; i >= 56; i--) {
            this.buf_[i] = totalBits & 255;
            totalBits /= 256; // Don't use bit-shifting here!
        }
        this.compress_(this.buf_);
        let n = 0;
        for (let i = 0; i < 5; i++) {
            for (let j = 24; j >= 0; j -= 8) {
                digest[n] = (this.chain_[i] >> j) & 255;
                ++n;
            }
        }
        return digest;
    }
}

/**
 * Helper to make a Subscribe function (just like Promise helps make a
 * Thenable).
 *
 * @param executor Function which can make calls to a single Observer
 *     as a proxy.
 * @param onNoObservers Callback when count of Observers goes to zero.
 */
function createSubscribe(executor, onNoObservers) {
    const proxy = new ObserverProxy(executor, onNoObservers);
    return proxy.subscribe.bind(proxy);
}
/**
 * Implement fan-out for any number of Observers attached via a subscribe
 * function.
 */
class ObserverProxy {
    /**
     * @param executor Function which can make calls to a single Observer
     *     as a proxy.
     * @param onNoObservers Callback when count of Observers goes to zero.
     */
    constructor(executor, onNoObservers) {
        this.observers = [];
        this.unsubscribes = [];
        this.observerCount = 0;
        // Micro-task scheduling by calling task.then().
        this.task = Promise.resolve();
        this.finalized = false;
        this.onNoObservers = onNoObservers;
        // Call the executor asynchronously so subscribers that are called
        // synchronously after the creation of the subscribe function
        // can still receive the very first value generated in the executor.
        this.task
            .then(() => {
            executor(this);
        })
            .catch(e => {
            this.error(e);
        });
    }
    next(value) {
        this.forEachObserver((observer) => {
            observer.next(value);
        });
    }
    error(error) {
        this.forEachObserver((observer) => {
            observer.error(error);
        });
        this.close(error);
    }
    complete() {
        this.forEachObserver((observer) => {
            observer.complete();
        });
        this.close();
    }
    /**
     * Subscribe function that can be used to add an Observer to the fan-out list.
     *
     * - We require that no event is sent to a subscriber sychronously to their
     *   call to subscribe().
     */
    subscribe(nextOrObserver, error, complete) {
        let observer;
        if (nextOrObserver === undefined &&
            error === undefined &&
            complete === undefined) {
            throw new Error('Missing Observer.');
        }
        // Assemble an Observer object when passed as callback functions.
        if (implementsAnyMethods(nextOrObserver, [
            'next',
            'error',
            'complete'
        ])) {
            observer = nextOrObserver;
        }
        else {
            observer = {
                next: nextOrObserver,
                error,
                complete
            };
        }
        if (observer.next === undefined) {
            observer.next = noop;
        }
        if (observer.error === undefined) {
            observer.error = noop;
        }
        if (observer.complete === undefined) {
            observer.complete = noop;
        }
        const unsub = this.unsubscribeOne.bind(this, this.observers.length);
        // Attempt to subscribe to a terminated Observable - we
        // just respond to the Observer with the final error or complete
        // event.
        if (this.finalized) {
            // eslint-disable-next-line @typescript-eslint/no-floating-promises
            this.task.then(() => {
                try {
                    if (this.finalError) {
                        observer.error(this.finalError);
                    }
                    else {
                        observer.complete();
                    }
                }
                catch (e) {
                    // nothing
                }
                return;
            });
        }
        this.observers.push(observer);
        return unsub;
    }
    // Unsubscribe is synchronous - we guarantee that no events are sent to
    // any unsubscribed Observer.
    unsubscribeOne(i) {
        if (this.observers === undefined || this.observers[i] === undefined) {
            return;
        }
        delete this.observers[i];
        this.observerCount -= 1;
        if (this.observerCount === 0 && this.onNoObservers !== undefined) {
            this.onNoObservers(this);
        }
    }
    forEachObserver(fn) {
        if (this.finalized) {
            // Already closed by previous event....just eat the additional values.
            return;
        }
        // Since sendOne calls asynchronously - there is no chance that
        // this.observers will become undefined.
        for (let i = 0; i < this.observers.length; i++) {
            this.sendOne(i, fn);
        }
    }
    // Call the Observer via one of it's callback function. We are careful to
    // confirm that the observe has not been unsubscribed since this asynchronous
    // function had been queued.
    sendOne(i, fn) {
        // Execute the callback asynchronously
        // eslint-disable-next-line @typescript-eslint/no-floating-promises
        this.task.then(() => {
            if (this.observers !== undefined && this.observers[i] !== undefined) {
                try {
                    fn(this.observers[i]);
                }
                catch (e) {
                    // Ignore exceptions raised in Observers or missing methods of an
                    // Observer.
                    // Log error to console. b/31404806
                    if (typeof console !== 'undefined' && console.error) {
                        console.error(e);
                    }
                }
            }
        });
    }
    close(err) {
        if (this.finalized) {
            return;
        }
        this.finalized = true;
        if (err !== undefined) {
            this.finalError = err;
        }
        // Proxy is no longer needed - garbage collect references
        // eslint-disable-next-line @typescript-eslint/no-floating-promises
        this.task.then(() => {
            this.observers = undefined;
            this.onNoObservers = undefined;
        });
    }
}
/** Turn synchronous function into one called asynchronously. */
// eslint-disable-next-line @typescript-eslint/ban-types
function async(fn, onError) {
    return (...args) => {
        Promise.resolve(true)
            .then(() => {
            fn(...args);
        })
            .catch((error) => {
            if (onError) {
                onError(error);
            }
        });
    };
}
/**
 * Return true if the object passed in implements any of the named methods.
 */
function implementsAnyMethods(obj, methods) {
    if (typeof obj !== 'object' || obj === null) {
        return false;
    }
    for (const method of methods) {
        if (method in obj && typeof obj[method] === 'function') {
            return true;
        }
    }
    return false;
}
function noop() {
    // do nothing
}

/**
 * @license
 * Copyright 2017 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
/**
 * Check to make sure the appropriate number of arguments are provided for a public function.
 * Throws an error if it fails.
 *
 * @param fnName The function name
 * @param minCount The minimum number of arguments to allow for the function call
 * @param maxCount The maximum number of argument to allow for the function call
 * @param argCount The actual number of arguments provided.
 */
const validateArgCount = function (fnName, minCount, maxCount, argCount) {
    let argError;
    if (argCount < minCount) {
        argError = 'at least ' + minCount;
    }
    else if (argCount > maxCount) {
        argError = maxCount === 0 ? 'none' : 'no more than ' + maxCount;
    }
    if (argError) {
        const error = fnName +
            ' failed: Was called with ' +
            argCount +
            (argCount === 1 ? ' argument.' : ' arguments.') +
            ' Expects ' +
            argError +
            '.';
        throw new Error(error);
    }
};
/**
 * Generates a string to prefix an error message about failed argument validation
 *
 * @param fnName The function name
 * @param argName The name of the argument
 * @return The prefix to add to the error thrown for validation.
 */
function errorPrefix(fnName, argName) {
    return `${fnName} failed: ${argName} argument `;
}
/**
 * @param fnName
 * @param argumentNumber
 * @param namespace
 * @param optional
 */
function validateNamespace(fnName, namespace, optional) {
    if (optional && !namespace) {
        return;
    }
    if (typeof namespace !== 'string') {
        //TODO: I should do more validation here. We only allow certain chars in namespaces.
        throw new Error(errorPrefix(fnName, 'namespace') + 'must be a valid firebase namespace.');
    }
}
function validateCallback(fnName, argumentName, 
// eslint-disable-next-line @typescript-eslint/ban-types
callback, optional) {
    if (optional && !callback) {
        return;
    }
    if (typeof callback !== 'function') {
        throw new Error(errorPrefix(fnName, argumentName) + 'must be a valid function.');
    }
}
function validateContextObject(fnName, argumentName, context, optional) {
    if (optional && !context) {
        return;
    }
    if (typeof context !== 'object' || context === null) {
        throw new Error(errorPrefix(fnName, argumentName) + 'must be a valid context object.');
    }
}

/**
 * @license
 * Copyright 2017 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
// Code originally came from goog.crypt.stringToUtf8ByteArray, but for some reason they
// automatically replaced '\r\n' with '\n', and they didn't handle surrogate pairs,
// so it's been modified.
// Note that not all Unicode characters appear as single characters in JavaScript strings.
// fromCharCode returns the UTF-16 encoding of a character - so some Unicode characters
// use 2 characters in Javascript.  All 4-byte UTF-8 characters begin with a first
// character in the range 0xD800 - 0xDBFF (the first character of a so-called surrogate
// pair).
// See http://www.ecma-international.org/ecma-262/5.1/#sec-15.1.3
/**
 * @param {string} str
 * @return {Array}
 */
const stringToByteArray = function (str) {
    const out = [];
    let p = 0;
    for (let i = 0; i < str.length; i++) {
        let c = str.charCodeAt(i);
        // Is this the lead surrogate in a surrogate pair?
        if (c >= 0xd800 && c <= 0xdbff) {
            const high = c - 0xd800; // the high 10 bits.
            i++;
            assert(i < str.length, 'Surrogate pair missing trail surrogate.');
            const low = str.charCodeAt(i) - 0xdc00; // the low 10 bits.
            c = 0x10000 + (high << 10) + low;
        }
        if (c < 128) {
            out[p++] = c;
        }
        else if (c < 2048) {
            out[p++] = (c >> 6) | 192;
            out[p++] = (c & 63) | 128;
        }
        else if (c < 65536) {
            out[p++] = (c >> 12) | 224;
            out[p++] = ((c >> 6) & 63) | 128;
            out[p++] = (c & 63) | 128;
        }
        else {
            out[p++] = (c >> 18) | 240;
            out[p++] = ((c >> 12) & 63) | 128;
            out[p++] = ((c >> 6) & 63) | 128;
            out[p++] = (c & 63) | 128;
        }
    }
    return out;
};
/**
 * Calculate length without actually converting; useful for doing cheaper validation.
 * @param {string} str
 * @return {number}
 */
const stringLength = function (str) {
    let p = 0;
    for (let i = 0; i < str.length; i++) {
        const c = str.charCodeAt(i);
        if (c < 128) {
            p++;
        }
        else if (c < 2048) {
            p += 2;
        }
        else if (c >= 0xd800 && c <= 0xdbff) {
            // Lead surrogate of a surrogate pair.  The pair together will take 4 bytes to represent.
            p += 4;
            i++; // skip trail surrogate.
        }
        else {
            p += 3;
        }
    }
    return p;
};

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
/**
 * The amount of milliseconds to exponentially increase.
 */
const DEFAULT_INTERVAL_MILLIS = 1000;
/**
 * The factor to backoff by.
 * Should be a number greater than 1.
 */
const DEFAULT_BACKOFF_FACTOR = 2;
/**
 * The maximum milliseconds to increase to.
 *
 * <p>Visible for testing
 */
const MAX_VALUE_MILLIS = 4 * 60 * 60 * 1000; // Four hours, like iOS and Android.
/**
 * The percentage of backoff time to randomize by.
 * See
 * http://go/safe-client-behavior#step-1-determine-the-appropriate-retry-interval-to-handle-spike-traffic
 * for context.
 *
 * <p>Visible for testing
 */
const RANDOM_FACTOR = 0.5;
/**
 * Based on the backoff method from
 * https://github.com/google/closure-library/blob/master/closure/goog/math/exponentialbackoff.js.
 * Extracted here so we don't need to pass metadata and a stateful ExponentialBackoff object around.
 */
function calculateBackoffMillis(backoffCount, intervalMillis = DEFAULT_INTERVAL_MILLIS, backoffFactor = DEFAULT_BACKOFF_FACTOR) {
    // Calculates an exponentially increasing value.
    // Deviation: calculates value from count and a constant interval, so we only need to save value
    // and count to restore state.
    const currBaseValue = intervalMillis * Math.pow(backoffFactor, backoffCount);
    // A random "fuzz" to avoid waves of retries.
    // Deviation: randomFactor is required.
    const randomWait = Math.round(
    // A fraction of the backoff value to add/subtract.
    // Deviation: changes multiplication order to improve readability.
    RANDOM_FACTOR *
        currBaseValue *
        // A random float (rounded to int by Math.round above) in the range [-1, 1]. Determines
        // if we add or subtract.
        (Math.random() - 0.5) *
        2);
    // Limits backoff to max to avoid effectively permanent backoff.
    return Math.min(MAX_VALUE_MILLIS, currBaseValue + randomWait);
}

/**
 * @license
 * Copyright 2020 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
/**
 * Provide English ordinal letters after a number
 */
function ordinal(i) {
    if (!Number.isFinite(i)) {
        return `${i}`;
    }
    return i + indicator(i);
}
function indicator(i) {
    i = Math.abs(i);
    const cent = i % 100;
    if (cent >= 10 && cent <= 20) {
        return 'th';
    }
    const dec = i % 10;
    if (dec === 1) {
        return 'st';
    }
    if (dec === 2) {
        return 'nd';
    }
    if (dec === 3) {
        return 'rd';
    }
    return 'th';
}

/**
 * @license
 * Copyright 2021 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
function getModularInstance(service) {
    if (service && service._delegate) {
        return service._delegate;
    }
    else {
        return service;
    }
}

/**
 * @license
 * Copyright 2022 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
/**
 * @internal
 */
function promisifyRequest(request, errorMessage) {
    return new Promise((resolve, reject) => {
        request.onsuccess = event => {
            resolve(event.target.result);
        };
        request.onerror = event => {
            var _a;
            reject(`${errorMessage}: ${(_a = event.target.error) === null || _a === void 0 ? void 0 : _a.message}`);
        };
    });
}
/**
 * @internal
 */
class DBWrapper {
    constructor(_db) {
        this._db = _db;
        this.objectStoreNames = this._db.objectStoreNames;
    }
    transaction(storeNames, mode = 'readonly') {
        return new TransactionWrapper(this._db.transaction.call(this._db, storeNames, mode));
    }
    createObjectStore(storeName, options) {
        return new ObjectStoreWrapper(this._db.createObjectStore(storeName, options));
    }
    close() {
        this._db.close();
    }
}
/**
 * @internal
 */
class TransactionWrapper {
    constructor(_transaction) {
        this._transaction = _transaction;
        this.complete = new Promise((resolve, reject) => {
            this._transaction.oncomplete = function () {
                resolve();
            };
            this._transaction.onerror = () => {
                reject(this._transaction.error);
            };
            this._transaction.onabort = () => {
                reject(this._transaction.error);
            };
        });
    }
    objectStore(storeName) {
        return new ObjectStoreWrapper(this._transaction.objectStore(storeName));
    }
}
/**
 * @internal
 */
class ObjectStoreWrapper {
    constructor(_store) {
        this._store = _store;
    }
    index(name) {
        return new IndexWrapper(this._store.index(name));
    }
    createIndex(name, keypath, options) {
        return new IndexWrapper(this._store.createIndex(name, keypath, options));
    }
    get(key) {
        const request = this._store.get(key);
        return promisifyRequest(request, 'Error reading from IndexedDB');
    }
    put(value, key) {
        const request = this._store.put(value, key);
        return promisifyRequest(request, 'Error writing to IndexedDB');
    }
    delete(key) {
        const request = this._store.delete(key);
        return promisifyRequest(request, 'Error deleting from IndexedDB');
    }
    clear() {
        const request = this._store.clear();
        return promisifyRequest(request, 'Error clearing IndexedDB object store');
    }
}
/**
 * @internal
 */
class IndexWrapper {
    constructor(_index) {
        this._index = _index;
    }
    get(key) {
        const request = this._index.get(key);
        return promisifyRequest(request, 'Error reading from IndexedDB');
    }
}
/**
 * @internal
 */
function openDB(dbName, dbVersion, upgradeCallback) {
    return new Promise((resolve, reject) => {
        try {
            const request = indexedDB.open(dbName, dbVersion);
            request.onsuccess = event => {
                resolve(new DBWrapper(event.target.result));
            };
            request.onerror = event => {
                var _a;
                reject(`Error opening indexedDB: ${(_a = event.target.error) === null || _a === void 0 ? void 0 : _a.message}`);
            };
            request.onupgradeneeded = event => {
                upgradeCallback(new DBWrapper(request.result), event.oldVersion, event.newVersion, new TransactionWrapper(request.transaction));
            };
        }
        catch (e) {
            reject(`Error opening indexedDB: ${e.message}`);
        }
    });
}
/**
 * @internal
 */
async function deleteDB(dbName) {
    return new Promise((resolve, reject) => {
        try {
            const request = indexedDB.deleteDatabase(dbName);
            request.onsuccess = () => {
                resolve();
            };
            request.onerror = event => {
                var _a;
                reject(`Error deleting indexedDB database "${dbName}": ${(_a = event.target.error) === null || _a === void 0 ? void 0 : _a.message}`);
            };
        }
        catch (e) {
            reject(`Error deleting indexedDB database "${dbName}": ${e.message}`);
        }
    });
}


//# sourceMappingURL=index.esm2017.js.map


/***/ }),

/***/ "./node_modules/firebase/analytics/dist/index.esm.js":
/*!***********************************************************!*\
  !*** ./node_modules/firebase/analytics/dist/index.esm.js ***!
  \***********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "getAnalytics": () => (/* reexport safe */ _firebase_analytics__WEBPACK_IMPORTED_MODULE_0__.getAnalytics),
/* harmony export */   "initializeAnalytics": () => (/* reexport safe */ _firebase_analytics__WEBPACK_IMPORTED_MODULE_0__.initializeAnalytics),
/* harmony export */   "isSupported": () => (/* reexport safe */ _firebase_analytics__WEBPACK_IMPORTED_MODULE_0__.isSupported),
/* harmony export */   "logEvent": () => (/* reexport safe */ _firebase_analytics__WEBPACK_IMPORTED_MODULE_0__.logEvent),
/* harmony export */   "setAnalyticsCollectionEnabled": () => (/* reexport safe */ _firebase_analytics__WEBPACK_IMPORTED_MODULE_0__.setAnalyticsCollectionEnabled),
/* harmony export */   "setCurrentScreen": () => (/* reexport safe */ _firebase_analytics__WEBPACK_IMPORTED_MODULE_0__.setCurrentScreen),
/* harmony export */   "setUserId": () => (/* reexport safe */ _firebase_analytics__WEBPACK_IMPORTED_MODULE_0__.setUserId),
/* harmony export */   "setUserProperties": () => (/* reexport safe */ _firebase_analytics__WEBPACK_IMPORTED_MODULE_0__.setUserProperties),
/* harmony export */   "settings": () => (/* reexport safe */ _firebase_analytics__WEBPACK_IMPORTED_MODULE_0__.settings)
/* harmony export */ });
/* harmony import */ var _firebase_analytics__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @firebase/analytics */ "./node_modules/@firebase/analytics/dist/esm/index.esm2017.js");

//# sourceMappingURL=index.esm.js.map


/***/ }),

/***/ "./node_modules/firebase/app/dist/index.esm.js":
/*!*****************************************************!*\
  !*** ./node_modules/firebase/app/dist/index.esm.js ***!
  \*****************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "FirebaseError": () => (/* reexport safe */ _firebase_app__WEBPACK_IMPORTED_MODULE_0__.FirebaseError),
/* harmony export */   "SDK_VERSION": () => (/* reexport safe */ _firebase_app__WEBPACK_IMPORTED_MODULE_0__.SDK_VERSION),
/* harmony export */   "_DEFAULT_ENTRY_NAME": () => (/* reexport safe */ _firebase_app__WEBPACK_IMPORTED_MODULE_0__._DEFAULT_ENTRY_NAME),
/* harmony export */   "_addComponent": () => (/* reexport safe */ _firebase_app__WEBPACK_IMPORTED_MODULE_0__._addComponent),
/* harmony export */   "_addOrOverwriteComponent": () => (/* reexport safe */ _firebase_app__WEBPACK_IMPORTED_MODULE_0__._addOrOverwriteComponent),
/* harmony export */   "_apps": () => (/* reexport safe */ _firebase_app__WEBPACK_IMPORTED_MODULE_0__._apps),
/* harmony export */   "_clearComponents": () => (/* reexport safe */ _firebase_app__WEBPACK_IMPORTED_MODULE_0__._clearComponents),
/* harmony export */   "_components": () => (/* reexport safe */ _firebase_app__WEBPACK_IMPORTED_MODULE_0__._components),
/* harmony export */   "_getProvider": () => (/* reexport safe */ _firebase_app__WEBPACK_IMPORTED_MODULE_0__._getProvider),
/* harmony export */   "_registerComponent": () => (/* reexport safe */ _firebase_app__WEBPACK_IMPORTED_MODULE_0__._registerComponent),
/* harmony export */   "_removeServiceInstance": () => (/* reexport safe */ _firebase_app__WEBPACK_IMPORTED_MODULE_0__._removeServiceInstance),
/* harmony export */   "deleteApp": () => (/* reexport safe */ _firebase_app__WEBPACK_IMPORTED_MODULE_0__.deleteApp),
/* harmony export */   "getApp": () => (/* reexport safe */ _firebase_app__WEBPACK_IMPORTED_MODULE_0__.getApp),
/* harmony export */   "getApps": () => (/* reexport safe */ _firebase_app__WEBPACK_IMPORTED_MODULE_0__.getApps),
/* harmony export */   "initializeApp": () => (/* reexport safe */ _firebase_app__WEBPACK_IMPORTED_MODULE_0__.initializeApp),
/* harmony export */   "onLog": () => (/* reexport safe */ _firebase_app__WEBPACK_IMPORTED_MODULE_0__.onLog),
/* harmony export */   "registerVersion": () => (/* reexport safe */ _firebase_app__WEBPACK_IMPORTED_MODULE_0__.registerVersion),
/* harmony export */   "setLogLevel": () => (/* reexport safe */ _firebase_app__WEBPACK_IMPORTED_MODULE_0__.setLogLevel)
/* harmony export */ });
/* harmony import */ var _firebase_app__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @firebase/app */ "./node_modules/@firebase/app/dist/esm/index.esm2017.js");



var name = "firebase";
var version = "9.7.0";

/**
 * @license
 * Copyright 2020 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
(0,_firebase_app__WEBPACK_IMPORTED_MODULE_0__.registerVersion)(name, version, 'app');
//# sourceMappingURL=index.esm.js.map


/***/ }),

/***/ "./node_modules/firebase/messaging/dist/index.esm.js":
/*!***********************************************************!*\
  !*** ./node_modules/firebase/messaging/dist/index.esm.js ***!
  \***********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "deleteToken": () => (/* reexport safe */ _firebase_messaging__WEBPACK_IMPORTED_MODULE_0__.deleteToken),
/* harmony export */   "getMessaging": () => (/* reexport safe */ _firebase_messaging__WEBPACK_IMPORTED_MODULE_0__.getMessaging),
/* harmony export */   "getToken": () => (/* reexport safe */ _firebase_messaging__WEBPACK_IMPORTED_MODULE_0__.getToken),
/* harmony export */   "isSupported": () => (/* reexport safe */ _firebase_messaging__WEBPACK_IMPORTED_MODULE_0__.isSupported),
/* harmony export */   "onMessage": () => (/* reexport safe */ _firebase_messaging__WEBPACK_IMPORTED_MODULE_0__.onMessage)
/* harmony export */ });
/* harmony import */ var _firebase_messaging__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @firebase/messaging */ "./node_modules/@firebase/messaging/dist/esm/index.esm2017.js");

//# sourceMappingURL=index.esm.js.map


/***/ }),

/***/ "./node_modules/@firebase/analytics/dist/esm/index.esm2017.js":
/*!********************************************************************!*\
  !*** ./node_modules/@firebase/analytics/dist/esm/index.esm2017.js ***!
  \********************************************************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "getAnalytics": () => (/* binding */ getAnalytics),
/* harmony export */   "initializeAnalytics": () => (/* binding */ initializeAnalytics),
/* harmony export */   "isSupported": () => (/* binding */ isSupported),
/* harmony export */   "logEvent": () => (/* binding */ logEvent),
/* harmony export */   "setAnalyticsCollectionEnabled": () => (/* binding */ setAnalyticsCollectionEnabled),
/* harmony export */   "setCurrentScreen": () => (/* binding */ setCurrentScreen),
/* harmony export */   "setUserId": () => (/* binding */ setUserId),
/* harmony export */   "setUserProperties": () => (/* binding */ setUserProperties),
/* harmony export */   "settings": () => (/* binding */ settings)
/* harmony export */ });
/* harmony import */ var _firebase_app__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @firebase/app */ "./node_modules/@firebase/app/dist/esm/index.esm2017.js");
/* harmony import */ var _firebase_logger__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @firebase/logger */ "./node_modules/@firebase/logger/dist/esm/index.esm2017.js");
/* harmony import */ var _firebase_util__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @firebase/util */ "./node_modules/@firebase/util/dist/index.esm2017.js");
/* harmony import */ var _firebase_component__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @firebase/component */ "./node_modules/@firebase/component/dist/esm/index.esm2017.js");
/* harmony import */ var _firebase_installations__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @firebase/installations */ "./node_modules/@firebase/installations/dist/esm/index.esm2017.js");






/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
/**
 * Type constant for Firebase Analytics.
 */
const ANALYTICS_TYPE = 'analytics';
// Key to attach FID to in gtag params.
const GA_FID_KEY = 'firebase_id';
const ORIGIN_KEY = 'origin';
const FETCH_TIMEOUT_MILLIS = 60 * 1000;
const DYNAMIC_CONFIG_URL = 'https://firebase.googleapis.com/v1alpha/projects/-/apps/{app-id}/webConfig';
const GTAG_URL = 'https://www.googletagmanager.com/gtag/js';

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
const logger = new _firebase_logger__WEBPACK_IMPORTED_MODULE_1__.Logger('@firebase/analytics');

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
/**
 * Makeshift polyfill for Promise.allSettled(). Resolves when all promises
 * have either resolved or rejected.
 *
 * @param promises Array of promises to wait for.
 */
function promiseAllSettled(promises) {
    return Promise.all(promises.map(promise => promise.catch(e => e)));
}
/**
 * Inserts gtag script tag into the page to asynchronously download gtag.
 * @param dataLayerName Name of datalayer (most often the default, "_dataLayer").
 */
function insertScriptTag(dataLayerName, measurementId) {
    const script = document.createElement('script');
    // We are not providing an analyticsId in the URL because it would trigger a `page_view`
    // without fid. We will initialize ga-id using gtag (config) command together with fid.
    script.src = `${GTAG_URL}?l=${dataLayerName}&id=${measurementId}`;
    script.async = true;
    document.head.appendChild(script);
}
/**
 * Get reference to, or create, global datalayer.
 * @param dataLayerName Name of datalayer (most often the default, "_dataLayer").
 */
function getOrCreateDataLayer(dataLayerName) {
    // Check for existing dataLayer and create if needed.
    let dataLayer = [];
    if (Array.isArray(window[dataLayerName])) {
        dataLayer = window[dataLayerName];
    }
    else {
        window[dataLayerName] = dataLayer;
    }
    return dataLayer;
}
/**
 * Wrapped gtag logic when gtag is called with 'config' command.
 *
 * @param gtagCore Basic gtag function that just appends to dataLayer.
 * @param initializationPromisesMap Map of appIds to their initialization promises.
 * @param dynamicConfigPromisesList Array of dynamic config fetch promises.
 * @param measurementIdToAppId Map of GA measurementIDs to corresponding Firebase appId.
 * @param measurementId GA Measurement ID to set config for.
 * @param gtagParams Gtag config params to set.
 */
async function gtagOnConfig(gtagCore, initializationPromisesMap, dynamicConfigPromisesList, measurementIdToAppId, measurementId, gtagParams) {
    // If config is already fetched, we know the appId and can use it to look up what FID promise we
    /// are waiting for, and wait only on that one.
    const correspondingAppId = measurementIdToAppId[measurementId];
    try {
        if (correspondingAppId) {
            await initializationPromisesMap[correspondingAppId];
        }
        else {
            // If config is not fetched yet, wait for all configs (we don't know which one we need) and
            // find the appId (if any) corresponding to this measurementId. If there is one, wait on
            // that appId's initialization promise. If there is none, promise resolves and gtag
            // call goes through.
            const dynamicConfigResults = await promiseAllSettled(dynamicConfigPromisesList);
            const foundConfig = dynamicConfigResults.find(config => config.measurementId === measurementId);
            if (foundConfig) {
                await initializationPromisesMap[foundConfig.appId];
            }
        }
    }
    catch (e) {
        logger.error(e);
    }
    gtagCore("config" /* CONFIG */, measurementId, gtagParams);
}
/**
 * Wrapped gtag logic when gtag is called with 'event' command.
 *
 * @param gtagCore Basic gtag function that just appends to dataLayer.
 * @param initializationPromisesMap Map of appIds to their initialization promises.
 * @param dynamicConfigPromisesList Array of dynamic config fetch promises.
 * @param measurementId GA Measurement ID to log event to.
 * @param gtagParams Params to log with this event.
 */
async function gtagOnEvent(gtagCore, initializationPromisesMap, dynamicConfigPromisesList, measurementId, gtagParams) {
    try {
        let initializationPromisesToWaitFor = [];
        // If there's a 'send_to' param, check if any ID specified matches
        // an initializeIds() promise we are waiting for.
        if (gtagParams && gtagParams['send_to']) {
            let gaSendToList = gtagParams['send_to'];
            // Make it an array if is isn't, so it can be dealt with the same way.
            if (!Array.isArray(gaSendToList)) {
                gaSendToList = [gaSendToList];
            }
            // Checking 'send_to' fields requires having all measurement ID results back from
            // the dynamic config fetch.
            const dynamicConfigResults = await promiseAllSettled(dynamicConfigPromisesList);
            for (const sendToId of gaSendToList) {
                // Any fetched dynamic measurement ID that matches this 'send_to' ID
                const foundConfig = dynamicConfigResults.find(config => config.measurementId === sendToId);
                const initializationPromise = foundConfig && initializationPromisesMap[foundConfig.appId];
                if (initializationPromise) {
                    initializationPromisesToWaitFor.push(initializationPromise);
                }
                else {
                    // Found an item in 'send_to' that is not associated
                    // directly with an FID, possibly a group.  Empty this array,
                    // exit the loop early, and let it get populated below.
                    initializationPromisesToWaitFor = [];
                    break;
                }
            }
        }
        // This will be unpopulated if there was no 'send_to' field , or
        // if not all entries in the 'send_to' field could be mapped to
        // a FID. In these cases, wait on all pending initialization promises.
        if (initializationPromisesToWaitFor.length === 0) {
            initializationPromisesToWaitFor = Object.values(initializationPromisesMap);
        }
        // Run core gtag function with args after all relevant initialization
        // promises have been resolved.
        await Promise.all(initializationPromisesToWaitFor);
        // Workaround for http://b/141370449 - third argument cannot be undefined.
        gtagCore("event" /* EVENT */, measurementId, gtagParams || {});
    }
    catch (e) {
        logger.error(e);
    }
}
/**
 * Wraps a standard gtag function with extra code to wait for completion of
 * relevant initialization promises before sending requests.
 *
 * @param gtagCore Basic gtag function that just appends to dataLayer.
 * @param initializationPromisesMap Map of appIds to their initialization promises.
 * @param dynamicConfigPromisesList Array of dynamic config fetch promises.
 * @param measurementIdToAppId Map of GA measurementIDs to corresponding Firebase appId.
 */
function wrapGtag(gtagCore, 
/**
 * Allows wrapped gtag calls to wait on whichever intialization promises are required,
 * depending on the contents of the gtag params' `send_to` field, if any.
 */
initializationPromisesMap, 
/**
 * Wrapped gtag calls sometimes require all dynamic config fetches to have returned
 * before determining what initialization promises (which include FIDs) to wait for.
 */
dynamicConfigPromisesList, 
/**
 * Wrapped gtag config calls can narrow down which initialization promise (with FID)
 * to wait for if the measurementId is already fetched, by getting the corresponding appId,
 * which is the key for the initialization promises map.
 */
measurementIdToAppId) {
    /**
     * Wrapper around gtag that ensures FID is sent with gtag calls.
     * @param command Gtag command type.
     * @param idOrNameOrParams Measurement ID if command is EVENT/CONFIG, params if command is SET.
     * @param gtagParams Params if event is EVENT/CONFIG.
     */
    async function gtagWrapper(command, idOrNameOrParams, gtagParams) {
        try {
            // If event, check that relevant initialization promises have completed.
            if (command === "event" /* EVENT */) {
                // If EVENT, second arg must be measurementId.
                await gtagOnEvent(gtagCore, initializationPromisesMap, dynamicConfigPromisesList, idOrNameOrParams, gtagParams);
            }
            else if (command === "config" /* CONFIG */) {
                // If CONFIG, second arg must be measurementId.
                await gtagOnConfig(gtagCore, initializationPromisesMap, dynamicConfigPromisesList, measurementIdToAppId, idOrNameOrParams, gtagParams);
            }
            else {
                // If SET, second arg must be params.
                gtagCore("set" /* SET */, idOrNameOrParams);
            }
        }
        catch (e) {
            logger.error(e);
        }
    }
    return gtagWrapper;
}
/**
 * Creates global gtag function or wraps existing one if found.
 * This wrapped function attaches Firebase instance ID (FID) to gtag 'config' and
 * 'event' calls that belong to the GAID associated with this Firebase instance.
 *
 * @param initializationPromisesMap Map of appIds to their initialization promises.
 * @param dynamicConfigPromisesList Array of dynamic config fetch promises.
 * @param measurementIdToAppId Map of GA measurementIDs to corresponding Firebase appId.
 * @param dataLayerName Name of global GA datalayer array.
 * @param gtagFunctionName Name of global gtag function ("gtag" if not user-specified).
 */
function wrapOrCreateGtag(initializationPromisesMap, dynamicConfigPromisesList, measurementIdToAppId, dataLayerName, gtagFunctionName) {
    // Create a basic core gtag function
    let gtagCore = function (..._args) {
        // Must push IArguments object, not an array.
        window[dataLayerName].push(arguments);
    };
    // Replace it with existing one if found
    if (window[gtagFunctionName] &&
        typeof window[gtagFunctionName] === 'function') {
        // @ts-ignore
        gtagCore = window[gtagFunctionName];
    }
    window[gtagFunctionName] = wrapGtag(gtagCore, initializationPromisesMap, dynamicConfigPromisesList, measurementIdToAppId);
    return {
        gtagCore,
        wrappedGtag: window[gtagFunctionName]
    };
}
/**
 * Returns first script tag in DOM matching our gtag url pattern.
 */
function findGtagScriptOnPage() {
    const scriptTags = window.document.getElementsByTagName('script');
    for (const tag of Object.values(scriptTags)) {
        if (tag.src && tag.src.includes(GTAG_URL)) {
            return tag;
        }
    }
    return null;
}

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
const ERRORS = {
    ["already-exists" /* ALREADY_EXISTS */]: 'A Firebase Analytics instance with the appId {$id} ' +
        ' already exists. ' +
        'Only one Firebase Analytics instance can be created for each appId.',
    ["already-initialized" /* ALREADY_INITIALIZED */]: 'initializeAnalytics() cannot be called again with different options than those ' +
        'it was initially called with. It can be called again with the same options to ' +
        'return the existing instance, or getAnalytics() can be used ' +
        'to get a reference to the already-intialized instance.',
    ["already-initialized-settings" /* ALREADY_INITIALIZED_SETTINGS */]: 'Firebase Analytics has already been initialized.' +
        'settings() must be called before initializing any Analytics instance' +
        'or it will have no effect.',
    ["interop-component-reg-failed" /* INTEROP_COMPONENT_REG_FAILED */]: 'Firebase Analytics Interop Component failed to instantiate: {$reason}',
    ["invalid-analytics-context" /* INVALID_ANALYTICS_CONTEXT */]: 'Firebase Analytics is not supported in this environment. ' +
        'Wrap initialization of analytics in analytics.isSupported() ' +
        'to prevent initialization in unsupported environments. Details: {$errorInfo}',
    ["indexeddb-unavailable" /* INDEXEDDB_UNAVAILABLE */]: 'IndexedDB unavailable or restricted in this environment. ' +
        'Wrap initialization of analytics in analytics.isSupported() ' +
        'to prevent initialization in unsupported environments. Details: {$errorInfo}',
    ["fetch-throttle" /* FETCH_THROTTLE */]: 'The config fetch request timed out while in an exponential backoff state.' +
        ' Unix timestamp in milliseconds when fetch request throttling ends: {$throttleEndTimeMillis}.',
    ["config-fetch-failed" /* CONFIG_FETCH_FAILED */]: 'Dynamic config fetch failed: [{$httpStatus}] {$responseMessage}',
    ["no-api-key" /* NO_API_KEY */]: 'The "apiKey" field is empty in the local Firebase config. Firebase Analytics requires this field to' +
        'contain a valid API key.',
    ["no-app-id" /* NO_APP_ID */]: 'The "appId" field is empty in the local Firebase config. Firebase Analytics requires this field to' +
        'contain a valid app ID.'
};
const ERROR_FACTORY = new _firebase_util__WEBPACK_IMPORTED_MODULE_2__.ErrorFactory('analytics', 'Analytics', ERRORS);

/**
 * @license
 * Copyright 2020 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
/**
 * Backoff factor for 503 errors, which we want to be conservative about
 * to avoid overloading servers. Each retry interval will be
 * BASE_INTERVAL_MILLIS * LONG_RETRY_FACTOR ^ retryCount, so the second one
 * will be ~30 seconds (with fuzzing).
 */
const LONG_RETRY_FACTOR = 30;
/**
 * Base wait interval to multiplied by backoffFactor^backoffCount.
 */
const BASE_INTERVAL_MILLIS = 1000;
/**
 * Stubbable retry data storage class.
 */
class RetryData {
    constructor(throttleMetadata = {}, intervalMillis = BASE_INTERVAL_MILLIS) {
        this.throttleMetadata = throttleMetadata;
        this.intervalMillis = intervalMillis;
    }
    getThrottleMetadata(appId) {
        return this.throttleMetadata[appId];
    }
    setThrottleMetadata(appId, metadata) {
        this.throttleMetadata[appId] = metadata;
    }
    deleteThrottleMetadata(appId) {
        delete this.throttleMetadata[appId];
    }
}
const defaultRetryData = new RetryData();
/**
 * Set GET request headers.
 * @param apiKey App API key.
 */
function getHeaders(apiKey) {
    return new Headers({
        Accept: 'application/json',
        'x-goog-api-key': apiKey
    });
}
/**
 * Fetches dynamic config from backend.
 * @param app Firebase app to fetch config for.
 */
async function fetchDynamicConfig(appFields) {
    var _a;
    const { appId, apiKey } = appFields;
    const request = {
        method: 'GET',
        headers: getHeaders(apiKey)
    };
    const appUrl = DYNAMIC_CONFIG_URL.replace('{app-id}', appId);
    const response = await fetch(appUrl, request);
    if (response.status !== 200 && response.status !== 304) {
        let errorMessage = '';
        try {
            // Try to get any error message text from server response.
            const jsonResponse = (await response.json());
            if ((_a = jsonResponse.error) === null || _a === void 0 ? void 0 : _a.message) {
                errorMessage = jsonResponse.error.message;
            }
        }
        catch (_ignored) { }
        throw ERROR_FACTORY.create("config-fetch-failed" /* CONFIG_FETCH_FAILED */, {
            httpStatus: response.status,
            responseMessage: errorMessage
        });
    }
    return response.json();
}
/**
 * Fetches dynamic config from backend, retrying if failed.
 * @param app Firebase app to fetch config for.
 */
async function fetchDynamicConfigWithRetry(app, 
// retryData and timeoutMillis are parameterized to allow passing a different value for testing.
retryData = defaultRetryData, timeoutMillis) {
    const { appId, apiKey, measurementId } = app.options;
    if (!appId) {
        throw ERROR_FACTORY.create("no-app-id" /* NO_APP_ID */);
    }
    if (!apiKey) {
        if (measurementId) {
            return {
                measurementId,
                appId
            };
        }
        throw ERROR_FACTORY.create("no-api-key" /* NO_API_KEY */);
    }
    const throttleMetadata = retryData.getThrottleMetadata(appId) || {
        backoffCount: 0,
        throttleEndTimeMillis: Date.now()
    };
    const signal = new AnalyticsAbortSignal();
    setTimeout(async () => {
        // Note a very low delay, eg < 10ms, can elapse before listeners are initialized.
        signal.abort();
    }, timeoutMillis !== undefined ? timeoutMillis : FETCH_TIMEOUT_MILLIS);
    return attemptFetchDynamicConfigWithRetry({ appId, apiKey, measurementId }, throttleMetadata, signal, retryData);
}
/**
 * Runs one retry attempt.
 * @param appFields Necessary app config fields.
 * @param throttleMetadata Ongoing metadata to determine throttling times.
 * @param signal Abort signal.
 */
async function attemptFetchDynamicConfigWithRetry(appFields, { throttleEndTimeMillis, backoffCount }, signal, retryData = defaultRetryData // for testing
) {
    const { appId, measurementId } = appFields;
    // Starts with a (potentially zero) timeout to support resumption from stored state.
    // Ensures the throttle end time is honored if the last attempt timed out.
    // Note the SDK will never make a request if the fetch timeout expires at this point.
    try {
        await setAbortableTimeout(signal, throttleEndTimeMillis);
    }
    catch (e) {
        if (measurementId) {
            logger.warn(`Timed out fetching this Firebase app's measurement ID from the server.` +
                ` Falling back to the measurement ID ${measurementId}` +
                ` provided in the "measurementId" field in the local Firebase config. [${e.message}]`);
            return { appId, measurementId };
        }
        throw e;
    }
    try {
        const response = await fetchDynamicConfig(appFields);
        // Note the SDK only clears throttle state if response is success or non-retriable.
        retryData.deleteThrottleMetadata(appId);
        return response;
    }
    catch (e) {
        if (!isRetriableError(e)) {
            retryData.deleteThrottleMetadata(appId);
            if (measurementId) {
                logger.warn(`Failed to fetch this Firebase app's measurement ID from the server.` +
                    ` Falling back to the measurement ID ${measurementId}` +
                    ` provided in the "measurementId" field in the local Firebase config. [${e.message}]`);
                return { appId, measurementId };
            }
            else {
                throw e;
            }
        }
        const backoffMillis = Number(e.customData.httpStatus) === 503
            ? (0,_firebase_util__WEBPACK_IMPORTED_MODULE_2__.calculateBackoffMillis)(backoffCount, retryData.intervalMillis, LONG_RETRY_FACTOR)
            : (0,_firebase_util__WEBPACK_IMPORTED_MODULE_2__.calculateBackoffMillis)(backoffCount, retryData.intervalMillis);
        // Increments backoff state.
        const throttleMetadata = {
            throttleEndTimeMillis: Date.now() + backoffMillis,
            backoffCount: backoffCount + 1
        };
        // Persists state.
        retryData.setThrottleMetadata(appId, throttleMetadata);
        logger.debug(`Calling attemptFetch again in ${backoffMillis} millis`);
        return attemptFetchDynamicConfigWithRetry(appFields, throttleMetadata, signal, retryData);
    }
}
/**
 * Supports waiting on a backoff by:
 *
 * <ul>
 *   <li>Promisifying setTimeout, so we can set a timeout in our Promise chain</li>
 *   <li>Listening on a signal bus for abort events, just like the Fetch API</li>
 *   <li>Failing in the same way the Fetch API fails, so timing out a live request and a throttled
 *       request appear the same.</li>
 * </ul>
 *
 * <p>Visible for testing.
 */
function setAbortableTimeout(signal, throttleEndTimeMillis) {
    return new Promise((resolve, reject) => {
        // Derives backoff from given end time, normalizing negative numbers to zero.
        const backoffMillis = Math.max(throttleEndTimeMillis - Date.now(), 0);
        const timeout = setTimeout(resolve, backoffMillis);
        // Adds listener, rather than sets onabort, because signal is a shared object.
        signal.addEventListener(() => {
            clearTimeout(timeout);
            // If the request completes before this timeout, the rejection has no effect.
            reject(ERROR_FACTORY.create("fetch-throttle" /* FETCH_THROTTLE */, {
                throttleEndTimeMillis
            }));
        });
    });
}
/**
 * Returns true if the {@link Error} indicates a fetch request may succeed later.
 */
function isRetriableError(e) {
    if (!(e instanceof _firebase_util__WEBPACK_IMPORTED_MODULE_2__.FirebaseError) || !e.customData) {
        return false;
    }
    // Uses string index defined by ErrorData, which FirebaseError implements.
    const httpStatus = Number(e.customData['httpStatus']);
    return (httpStatus === 429 ||
        httpStatus === 500 ||
        httpStatus === 503 ||
        httpStatus === 504);
}
/**
 * Shims a minimal AbortSignal (copied from Remote Config).
 *
 * <p>AbortController's AbortSignal conveniently decouples fetch timeout logic from other aspects
 * of networking, such as retries. Firebase doesn't use AbortController enough to justify a
 * polyfill recommendation, like we do with the Fetch API, but this minimal shim can easily be
 * swapped out if/when we do.
 */
class AnalyticsAbortSignal {
    constructor() {
        this.listeners = [];
    }
    addEventListener(listener) {
        this.listeners.push(listener);
    }
    abort() {
        this.listeners.forEach(listener => listener());
    }
}

/**
 * @license
 * Copyright 2020 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
async function validateIndexedDB() {
    if (!(0,_firebase_util__WEBPACK_IMPORTED_MODULE_2__.isIndexedDBAvailable)()) {
        logger.warn(ERROR_FACTORY.create("indexeddb-unavailable" /* INDEXEDDB_UNAVAILABLE */, {
            errorInfo: 'IndexedDB is not available in this environment.'
        }).message);
        return false;
    }
    else {
        try {
            await (0,_firebase_util__WEBPACK_IMPORTED_MODULE_2__.validateIndexedDBOpenable)();
        }
        catch (e) {
            logger.warn(ERROR_FACTORY.create("indexeddb-unavailable" /* INDEXEDDB_UNAVAILABLE */, {
                errorInfo: e
            }).message);
            return false;
        }
    }
    return true;
}
/**
 * Initialize the analytics instance in gtag.js by calling config command with fid.
 *
 * NOTE: We combine analytics initialization and setting fid together because we want fid to be
 * part of the `page_view` event that's sent during the initialization
 * @param app Firebase app
 * @param gtagCore The gtag function that's not wrapped.
 * @param dynamicConfigPromisesList Array of all dynamic config promises.
 * @param measurementIdToAppId Maps measurementID to appID.
 * @param installations _FirebaseInstallationsInternal instance.
 *
 * @returns Measurement ID.
 */
async function _initializeAnalytics(app, dynamicConfigPromisesList, measurementIdToAppId, installations, gtagCore, dataLayerName, options) {
    var _a;
    const dynamicConfigPromise = fetchDynamicConfigWithRetry(app);
    // Once fetched, map measurementIds to appId, for ease of lookup in wrapped gtag function.
    dynamicConfigPromise
        .then(config => {
        measurementIdToAppId[config.measurementId] = config.appId;
        if (app.options.measurementId &&
            config.measurementId !== app.options.measurementId) {
            logger.warn(`The measurement ID in the local Firebase config (${app.options.measurementId})` +
                ` does not match the measurement ID fetched from the server (${config.measurementId}).` +
                ` To ensure analytics events are always sent to the correct Analytics property,` +
                ` update the` +
                ` measurement ID field in the local config or remove it from the local config.`);
        }
    })
        .catch(e => logger.error(e));
    // Add to list to track state of all dynamic config promises.
    dynamicConfigPromisesList.push(dynamicConfigPromise);
    const fidPromise = validateIndexedDB().then(envIsValid => {
        if (envIsValid) {
            return installations.getId();
        }
        else {
            return undefined;
        }
    });
    const [dynamicConfig, fid] = await Promise.all([
        dynamicConfigPromise,
        fidPromise
    ]);
    // Detect if user has already put the gtag <script> tag on this page.
    if (!findGtagScriptOnPage()) {
        insertScriptTag(dataLayerName, dynamicConfig.measurementId);
    }
    // This command initializes gtag.js and only needs to be called once for the entire web app,
    // but since it is idempotent, we can call it multiple times.
    // We keep it together with other initialization logic for better code structure.
    // eslint-disable-next-line @typescript-eslint/no-explicit-any
    gtagCore('js', new Date());
    // User config added first. We don't want users to accidentally overwrite
    // base Firebase config properties.
    const configProperties = (_a = options === null || options === void 0 ? void 0 : options.config) !== null && _a !== void 0 ? _a : {};
    // guard against developers accidentally setting properties with prefix `firebase_`
    configProperties[ORIGIN_KEY] = 'firebase';
    configProperties.update = true;
    if (fid != null) {
        configProperties[GA_FID_KEY] = fid;
    }
    // It should be the first config command called on this GA-ID
    // Initialize this GA-ID and set FID on it using the gtag config API.
    // Note: This will trigger a page_view event unless 'send_page_view' is set to false in
    // `configProperties`.
    gtagCore("config" /* CONFIG */, dynamicConfig.measurementId, configProperties);
    return dynamicConfig.measurementId;
}

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
/**
 * Analytics Service class.
 */
class AnalyticsService {
    constructor(app) {
        this.app = app;
    }
    _delete() {
        delete initializationPromisesMap[this.app.options.appId];
        return Promise.resolve();
    }
}
/**
 * Maps appId to full initialization promise. Wrapped gtag calls must wait on
 * all or some of these, depending on the call's `send_to` param and the status
 * of the dynamic config fetches (see below).
 */
let initializationPromisesMap = {};
/**
 * List of dynamic config fetch promises. In certain cases, wrapped gtag calls
 * wait on all these to be complete in order to determine if it can selectively
 * wait for only certain initialization (FID) promises or if it must wait for all.
 */
let dynamicConfigPromisesList = [];
/**
 * Maps fetched measurementIds to appId. Populated when the app's dynamic config
 * fetch completes. If already populated, gtag config calls can use this to
 * selectively wait for only this app's initialization promise (FID) instead of all
 * initialization promises.
 */
const measurementIdToAppId = {};
/**
 * Name for window global data layer array used by GA: defaults to 'dataLayer'.
 */
let dataLayerName = 'dataLayer';
/**
 * Name for window global gtag function used by GA: defaults to 'gtag'.
 */
let gtagName = 'gtag';
/**
 * Reproduction of standard gtag function or reference to existing
 * gtag function on window object.
 */
let gtagCoreFunction;
/**
 * Wrapper around gtag function that ensures FID is sent with all
 * relevant event and config calls.
 */
let wrappedGtagFunction;
/**
 * Flag to ensure page initialization steps (creation or wrapping of
 * dataLayer and gtag script) are only run once per page load.
 */
let globalInitDone = false;
/**
 * Configures Firebase Analytics to use custom `gtag` or `dataLayer` names.
 * Intended to be used if `gtag.js` script has been installed on
 * this page independently of Firebase Analytics, and is using non-default
 * names for either the `gtag` function or for `dataLayer`.
 * Must be called before calling `getAnalytics()` or it won't
 * have any effect.
 *
 * @public
 *
 * @param options - Custom gtag and dataLayer names.
 */
function settings(options) {
    if (globalInitDone) {
        throw ERROR_FACTORY.create("already-initialized" /* ALREADY_INITIALIZED */);
    }
    if (options.dataLayerName) {
        dataLayerName = options.dataLayerName;
    }
    if (options.gtagName) {
        gtagName = options.gtagName;
    }
}
/**
 * Returns true if no environment mismatch is found.
 * If environment mismatches are found, throws an INVALID_ANALYTICS_CONTEXT
 * error that also lists details for each mismatch found.
 */
function warnOnBrowserContextMismatch() {
    const mismatchedEnvMessages = [];
    if ((0,_firebase_util__WEBPACK_IMPORTED_MODULE_2__.isBrowserExtension)()) {
        mismatchedEnvMessages.push('This is a browser extension environment.');
    }
    if (!(0,_firebase_util__WEBPACK_IMPORTED_MODULE_2__.areCookiesEnabled)()) {
        mismatchedEnvMessages.push('Cookies are not available.');
    }
    if (mismatchedEnvMessages.length > 0) {
        const details = mismatchedEnvMessages
            .map((message, index) => `(${index + 1}) ${message}`)
            .join(' ');
        const err = ERROR_FACTORY.create("invalid-analytics-context" /* INVALID_ANALYTICS_CONTEXT */, {
            errorInfo: details
        });
        logger.warn(err.message);
    }
}
/**
 * Analytics instance factory.
 * @internal
 */
function factory(app, installations, options) {
    warnOnBrowserContextMismatch();
    const appId = app.options.appId;
    if (!appId) {
        throw ERROR_FACTORY.create("no-app-id" /* NO_APP_ID */);
    }
    if (!app.options.apiKey) {
        if (app.options.measurementId) {
            logger.warn(`The "apiKey" field is empty in the local Firebase config. This is needed to fetch the latest` +
                ` measurement ID for this Firebase app. Falling back to the measurement ID ${app.options.measurementId}` +
                ` provided in the "measurementId" field in the local Firebase config.`);
        }
        else {
            throw ERROR_FACTORY.create("no-api-key" /* NO_API_KEY */);
        }
    }
    if (initializationPromisesMap[appId] != null) {
        throw ERROR_FACTORY.create("already-exists" /* ALREADY_EXISTS */, {
            id: appId
        });
    }
    if (!globalInitDone) {
        // Steps here should only be done once per page: creation or wrapping
        // of dataLayer and global gtag function.
        getOrCreateDataLayer(dataLayerName);
        const { wrappedGtag, gtagCore } = wrapOrCreateGtag(initializationPromisesMap, dynamicConfigPromisesList, measurementIdToAppId, dataLayerName, gtagName);
        wrappedGtagFunction = wrappedGtag;
        gtagCoreFunction = gtagCore;
        globalInitDone = true;
    }
    // Async but non-blocking.
    // This map reflects the completion state of all promises for each appId.
    initializationPromisesMap[appId] = _initializeAnalytics(app, dynamicConfigPromisesList, measurementIdToAppId, installations, gtagCoreFunction, dataLayerName, options);
    const analyticsInstance = new AnalyticsService(app);
    return analyticsInstance;
}

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
/**
 * Logs an analytics event through the Firebase SDK.
 *
 * @param gtagFunction Wrapped gtag function that waits for fid to be set before sending an event
 * @param eventName Google Analytics event name, choose from standard list or use a custom string.
 * @param eventParams Analytics event parameters.
 */
async function logEvent$1(gtagFunction, initializationPromise, eventName, eventParams, options) {
    if (options && options.global) {
        gtagFunction("event" /* EVENT */, eventName, eventParams);
        return;
    }
    else {
        const measurementId = await initializationPromise;
        const params = Object.assign(Object.assign({}, eventParams), { 'send_to': measurementId });
        gtagFunction("event" /* EVENT */, eventName, params);
    }
}
/**
 * Set screen_name parameter for this Google Analytics ID.
 *
 * @param gtagFunction Wrapped gtag function that waits for fid to be set before sending an event
 * @param screenName Screen name string to set.
 */
async function setCurrentScreen$1(gtagFunction, initializationPromise, screenName, options) {
    if (options && options.global) {
        gtagFunction("set" /* SET */, { 'screen_name': screenName });
        return Promise.resolve();
    }
    else {
        const measurementId = await initializationPromise;
        gtagFunction("config" /* CONFIG */, measurementId, {
            update: true,
            'screen_name': screenName
        });
    }
}
/**
 * Set user_id parameter for this Google Analytics ID.
 *
 * @param gtagFunction Wrapped gtag function that waits for fid to be set before sending an event
 * @param id User ID string to set
 */
async function setUserId$1(gtagFunction, initializationPromise, id, options) {
    if (options && options.global) {
        gtagFunction("set" /* SET */, { 'user_id': id });
        return Promise.resolve();
    }
    else {
        const measurementId = await initializationPromise;
        gtagFunction("config" /* CONFIG */, measurementId, {
            update: true,
            'user_id': id
        });
    }
}
/**
 * Set all other user properties other than user_id and screen_name.
 *
 * @param gtagFunction Wrapped gtag function that waits for fid to be set before sending an event
 * @param properties Map of user properties to set
 */
async function setUserProperties$1(gtagFunction, initializationPromise, properties, options) {
    if (options && options.global) {
        const flatProperties = {};
        for (const key of Object.keys(properties)) {
            // use dot notation for merge behavior in gtag.js
            flatProperties[`user_properties.${key}`] = properties[key];
        }
        gtagFunction("set" /* SET */, flatProperties);
        return Promise.resolve();
    }
    else {
        const measurementId = await initializationPromise;
        gtagFunction("config" /* CONFIG */, measurementId, {
            update: true,
            'user_properties': properties
        });
    }
}
/**
 * Set whether collection is enabled for this ID.
 *
 * @param enabled If true, collection is enabled for this ID.
 */
async function setAnalyticsCollectionEnabled$1(initializationPromise, enabled) {
    const measurementId = await initializationPromise;
    window[`ga-disable-${measurementId}`] = !enabled;
}

/* eslint-disable @typescript-eslint/no-explicit-any */
/**
 * Returns an {@link Analytics} instance for the given app.
 *
 * @public
 *
 * @param app - The {@link @firebase/app#FirebaseApp} to use.
 */
function getAnalytics(app = (0,_firebase_app__WEBPACK_IMPORTED_MODULE_0__.getApp)()) {
    app = (0,_firebase_util__WEBPACK_IMPORTED_MODULE_2__.getModularInstance)(app);
    // Dependencies
    const analyticsProvider = (0,_firebase_app__WEBPACK_IMPORTED_MODULE_0__._getProvider)(app, ANALYTICS_TYPE);
    if (analyticsProvider.isInitialized()) {
        return analyticsProvider.getImmediate();
    }
    return initializeAnalytics(app);
}
/**
 * Returns an {@link Analytics} instance for the given app.
 *
 * @public
 *
 * @param app - The {@link @firebase/app#FirebaseApp} to use.
 */
function initializeAnalytics(app, options = {}) {
    // Dependencies
    const analyticsProvider = (0,_firebase_app__WEBPACK_IMPORTED_MODULE_0__._getProvider)(app, ANALYTICS_TYPE);
    if (analyticsProvider.isInitialized()) {
        const existingInstance = analyticsProvider.getImmediate();
        if ((0,_firebase_util__WEBPACK_IMPORTED_MODULE_2__.deepEqual)(options, analyticsProvider.getOptions())) {
            return existingInstance;
        }
        else {
            throw ERROR_FACTORY.create("already-initialized" /* ALREADY_INITIALIZED */);
        }
    }
    const analyticsInstance = analyticsProvider.initialize({ options });
    return analyticsInstance;
}
/**
 * This is a public static method provided to users that wraps four different checks:
 *
 * 1. Check if it's not a browser extension environment.
 * 2. Check if cookies are enabled in current browser.
 * 3. Check if IndexedDB is supported by the browser environment.
 * 4. Check if the current browser context is valid for using `IndexedDB.open()`.
 *
 * @public
 *
 */
async function isSupported() {
    if ((0,_firebase_util__WEBPACK_IMPORTED_MODULE_2__.isBrowserExtension)()) {
        return false;
    }
    if (!(0,_firebase_util__WEBPACK_IMPORTED_MODULE_2__.areCookiesEnabled)()) {
        return false;
    }
    if (!(0,_firebase_util__WEBPACK_IMPORTED_MODULE_2__.isIndexedDBAvailable)()) {
        return false;
    }
    try {
        const isDBOpenable = await (0,_firebase_util__WEBPACK_IMPORTED_MODULE_2__.validateIndexedDBOpenable)();
        return isDBOpenable;
    }
    catch (error) {
        return false;
    }
}
/**
 * Use gtag `config` command to set `screen_name`.
 *
 * @public
 *
 * @param analyticsInstance - The {@link Analytics} instance.
 * @param screenName - Screen name to set.
 */
function setCurrentScreen(analyticsInstance, screenName, options) {
    analyticsInstance = (0,_firebase_util__WEBPACK_IMPORTED_MODULE_2__.getModularInstance)(analyticsInstance);
    setCurrentScreen$1(wrappedGtagFunction, initializationPromisesMap[analyticsInstance.app.options.appId], screenName, options).catch(e => logger.error(e));
}
/**
 * Use gtag `config` command to set `user_id`.
 *
 * @public
 *
 * @param analyticsInstance - The {@link Analytics} instance.
 * @param id - User ID to set.
 */
function setUserId(analyticsInstance, id, options) {
    analyticsInstance = (0,_firebase_util__WEBPACK_IMPORTED_MODULE_2__.getModularInstance)(analyticsInstance);
    setUserId$1(wrappedGtagFunction, initializationPromisesMap[analyticsInstance.app.options.appId], id, options).catch(e => logger.error(e));
}
/**
 * Use gtag `config` command to set all params specified.
 *
 * @public
 */
function setUserProperties(analyticsInstance, properties, options) {
    analyticsInstance = (0,_firebase_util__WEBPACK_IMPORTED_MODULE_2__.getModularInstance)(analyticsInstance);
    setUserProperties$1(wrappedGtagFunction, initializationPromisesMap[analyticsInstance.app.options.appId], properties, options).catch(e => logger.error(e));
}
/**
 * Sets whether Google Analytics collection is enabled for this app on this device.
 * Sets global `window['ga-disable-analyticsId'] = true;`
 *
 * @public
 *
 * @param analyticsInstance - The {@link Analytics} instance.
 * @param enabled - If true, enables collection, if false, disables it.
 */
function setAnalyticsCollectionEnabled(analyticsInstance, enabled) {
    analyticsInstance = (0,_firebase_util__WEBPACK_IMPORTED_MODULE_2__.getModularInstance)(analyticsInstance);
    setAnalyticsCollectionEnabled$1(initializationPromisesMap[analyticsInstance.app.options.appId], enabled).catch(e => logger.error(e));
}
/**
 * Sends a Google Analytics event with given `eventParams`. This method
 * automatically associates this logged event with this Firebase web
 * app instance on this device.
 * List of official event parameters can be found in the gtag.js
 * reference documentation:
 * {@link https://developers.google.com/gtagjs/reference/ga4-events
 * | the GA4 reference documentation}.
 *
 * @public
 */
function logEvent(analyticsInstance, eventName, eventParams, options) {
    analyticsInstance = (0,_firebase_util__WEBPACK_IMPORTED_MODULE_2__.getModularInstance)(analyticsInstance);
    logEvent$1(wrappedGtagFunction, initializationPromisesMap[analyticsInstance.app.options.appId], eventName, eventParams, options).catch(e => logger.error(e));
}

const name = "@firebase/analytics";
const version = "0.7.8";

/**
 * Firebase Analytics
 *
 * @packageDocumentation
 */
function registerAnalytics() {
    (0,_firebase_app__WEBPACK_IMPORTED_MODULE_0__._registerComponent)(new _firebase_component__WEBPACK_IMPORTED_MODULE_3__.Component(ANALYTICS_TYPE, (container, { options: analyticsOptions }) => {
        // getImmediate for FirebaseApp will always succeed
        const app = container.getProvider('app').getImmediate();
        const installations = container
            .getProvider('installations-internal')
            .getImmediate();
        return factory(app, installations, analyticsOptions);
    }, "PUBLIC" /* PUBLIC */));
    (0,_firebase_app__WEBPACK_IMPORTED_MODULE_0__._registerComponent)(new _firebase_component__WEBPACK_IMPORTED_MODULE_3__.Component('analytics-internal', internalFactory, "PRIVATE" /* PRIVATE */));
    (0,_firebase_app__WEBPACK_IMPORTED_MODULE_0__.registerVersion)(name, version);
    // BUILD_TARGET will be replaced by values like esm5, esm2017, cjs5, etc during the compilation
    (0,_firebase_app__WEBPACK_IMPORTED_MODULE_0__.registerVersion)(name, version, 'esm2017');
    function internalFactory(container) {
        try {
            const analytics = container.getProvider(ANALYTICS_TYPE).getImmediate();
            return {
                logEvent: (eventName, eventParams, options) => logEvent(analytics, eventName, eventParams, options)
            };
        }
        catch (e) {
            throw ERROR_FACTORY.create("interop-component-reg-failed" /* INTEROP_COMPONENT_REG_FAILED */, {
                reason: e
            });
        }
    }
}
registerAnalytics();


//# sourceMappingURL=index.esm2017.js.map


/***/ }),

/***/ "./node_modules/@firebase/app/dist/esm/index.esm2017.js":
/*!**************************************************************!*\
  !*** ./node_modules/@firebase/app/dist/esm/index.esm2017.js ***!
  \**************************************************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "FirebaseError": () => (/* reexport safe */ _firebase_util__WEBPACK_IMPORTED_MODULE_2__.FirebaseError),
/* harmony export */   "SDK_VERSION": () => (/* binding */ SDK_VERSION),
/* harmony export */   "_DEFAULT_ENTRY_NAME": () => (/* binding */ DEFAULT_ENTRY_NAME),
/* harmony export */   "_addComponent": () => (/* binding */ _addComponent),
/* harmony export */   "_addOrOverwriteComponent": () => (/* binding */ _addOrOverwriteComponent),
/* harmony export */   "_apps": () => (/* binding */ _apps),
/* harmony export */   "_clearComponents": () => (/* binding */ _clearComponents),
/* harmony export */   "_components": () => (/* binding */ _components),
/* harmony export */   "_getProvider": () => (/* binding */ _getProvider),
/* harmony export */   "_registerComponent": () => (/* binding */ _registerComponent),
/* harmony export */   "_removeServiceInstance": () => (/* binding */ _removeServiceInstance),
/* harmony export */   "deleteApp": () => (/* binding */ deleteApp),
/* harmony export */   "getApp": () => (/* binding */ getApp),
/* harmony export */   "getApps": () => (/* binding */ getApps),
/* harmony export */   "initializeApp": () => (/* binding */ initializeApp),
/* harmony export */   "onLog": () => (/* binding */ onLog),
/* harmony export */   "registerVersion": () => (/* binding */ registerVersion),
/* harmony export */   "setLogLevel": () => (/* binding */ setLogLevel)
/* harmony export */ });
/* harmony import */ var _firebase_component__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @firebase/component */ "./node_modules/@firebase/component/dist/esm/index.esm2017.js");
/* harmony import */ var _firebase_logger__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @firebase/logger */ "./node_modules/@firebase/logger/dist/esm/index.esm2017.js");
/* harmony import */ var _firebase_util__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @firebase/util */ "./node_modules/@firebase/util/dist/index.esm2017.js");





/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
class PlatformLoggerServiceImpl {
    constructor(container) {
        this.container = container;
    }
    // In initial implementation, this will be called by installations on
    // auth token refresh, and installations will send this string.
    getPlatformInfoString() {
        const providers = this.container.getProviders();
        // Loop through providers and get library/version pairs from any that are
        // version components.
        return providers
            .map(provider => {
            if (isVersionServiceProvider(provider)) {
                const service = provider.getImmediate();
                return `${service.library}/${service.version}`;
            }
            else {
                return null;
            }
        })
            .filter(logString => logString)
            .join(' ');
    }
}
/**
 *
 * @param provider check if this provider provides a VersionService
 *
 * NOTE: Using Provider<'app-version'> is a hack to indicate that the provider
 * provides VersionService. The provider is not necessarily a 'app-version'
 * provider.
 */
function isVersionServiceProvider(provider) {
    const component = provider.getComponent();
    return (component === null || component === void 0 ? void 0 : component.type) === "VERSION" /* VERSION */;
}

const name$o = "@firebase/app";
const version$1 = "0.7.22";

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
const logger = new _firebase_logger__WEBPACK_IMPORTED_MODULE_1__.Logger('@firebase/app');

const name$n = "@firebase/app-compat";

const name$m = "@firebase/analytics-compat";

const name$l = "@firebase/analytics";

const name$k = "@firebase/app-check-compat";

const name$j = "@firebase/app-check";

const name$i = "@firebase/auth";

const name$h = "@firebase/auth-compat";

const name$g = "@firebase/database";

const name$f = "@firebase/database-compat";

const name$e = "@firebase/functions";

const name$d = "@firebase/functions-compat";

const name$c = "@firebase/installations";

const name$b = "@firebase/installations-compat";

const name$a = "@firebase/messaging";

const name$9 = "@firebase/messaging-compat";

const name$8 = "@firebase/performance";

const name$7 = "@firebase/performance-compat";

const name$6 = "@firebase/remote-config";

const name$5 = "@firebase/remote-config-compat";

const name$4 = "@firebase/storage";

const name$3 = "@firebase/storage-compat";

const name$2 = "@firebase/firestore";

const name$1 = "@firebase/firestore-compat";

const name = "firebase";
const version = "9.7.0";

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
/**
 * The default app name
 *
 * @internal
 */
const DEFAULT_ENTRY_NAME = '[DEFAULT]';
const PLATFORM_LOG_STRING = {
    [name$o]: 'fire-core',
    [name$n]: 'fire-core-compat',
    [name$l]: 'fire-analytics',
    [name$m]: 'fire-analytics-compat',
    [name$j]: 'fire-app-check',
    [name$k]: 'fire-app-check-compat',
    [name$i]: 'fire-auth',
    [name$h]: 'fire-auth-compat',
    [name$g]: 'fire-rtdb',
    [name$f]: 'fire-rtdb-compat',
    [name$e]: 'fire-fn',
    [name$d]: 'fire-fn-compat',
    [name$c]: 'fire-iid',
    [name$b]: 'fire-iid-compat',
    [name$a]: 'fire-fcm',
    [name$9]: 'fire-fcm-compat',
    [name$8]: 'fire-perf',
    [name$7]: 'fire-perf-compat',
    [name$6]: 'fire-rc',
    [name$5]: 'fire-rc-compat',
    [name$4]: 'fire-gcs',
    [name$3]: 'fire-gcs-compat',
    [name$2]: 'fire-fst',
    [name$1]: 'fire-fst-compat',
    'fire-js': 'fire-js',
    [name]: 'fire-js-all'
};

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
/**
 * @internal
 */
const _apps = new Map();
/**
 * Registered components.
 *
 * @internal
 */
// eslint-disable-next-line @typescript-eslint/no-explicit-any
const _components = new Map();
/**
 * @param component - the component being added to this app's container
 *
 * @internal
 */
function _addComponent(app, component) {
    try {
        app.container.addComponent(component);
    }
    catch (e) {
        logger.debug(`Component ${component.name} failed to register with FirebaseApp ${app.name}`, e);
    }
}
/**
 *
 * @internal
 */
function _addOrOverwriteComponent(app, component) {
    app.container.addOrOverwriteComponent(component);
}
/**
 *
 * @param component - the component to register
 * @returns whether or not the component is registered successfully
 *
 * @internal
 */
function _registerComponent(component) {
    const componentName = component.name;
    if (_components.has(componentName)) {
        logger.debug(`There were multiple attempts to register component ${componentName}.`);
        return false;
    }
    _components.set(componentName, component);
    // add the component to existing app instances
    for (const app of _apps.values()) {
        _addComponent(app, component);
    }
    return true;
}
/**
 *
 * @param app - FirebaseApp instance
 * @param name - service name
 *
 * @returns the provider for the service with the matching name
 *
 * @internal
 */
function _getProvider(app, name) {
    const heartbeatController = app.container
        .getProvider('heartbeat')
        .getImmediate({ optional: true });
    if (heartbeatController) {
        void heartbeatController.triggerHeartbeat();
    }
    return app.container.getProvider(name);
}
/**
 *
 * @param app - FirebaseApp instance
 * @param name - service name
 * @param instanceIdentifier - service instance identifier in case the service supports multiple instances
 *
 * @internal
 */
function _removeServiceInstance(app, name, instanceIdentifier = DEFAULT_ENTRY_NAME) {
    _getProvider(app, name).clearInstance(instanceIdentifier);
}
/**
 * Test only
 *
 * @internal
 */
function _clearComponents() {
    _components.clear();
}

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
const ERRORS = {
    ["no-app" /* NO_APP */]: "No Firebase App '{$appName}' has been created - " +
        'call Firebase App.initializeApp()',
    ["bad-app-name" /* BAD_APP_NAME */]: "Illegal App name: '{$appName}",
    ["duplicate-app" /* DUPLICATE_APP */]: "Firebase App named '{$appName}' already exists with different options or config",
    ["app-deleted" /* APP_DELETED */]: "Firebase App named '{$appName}' already deleted",
    ["invalid-app-argument" /* INVALID_APP_ARGUMENT */]: 'firebase.{$appName}() takes either no argument or a ' +
        'Firebase App instance.',
    ["invalid-log-argument" /* INVALID_LOG_ARGUMENT */]: 'First argument to `onLog` must be null or a function.',
    ["storage-open" /* STORAGE_OPEN */]: 'Error thrown when opening storage. Original error: {$originalErrorMessage}.',
    ["storage-get" /* STORAGE_GET */]: 'Error thrown when reading from storage. Original error: {$originalErrorMessage}.',
    ["storage-set" /* STORAGE_WRITE */]: 'Error thrown when writing to storage. Original error: {$originalErrorMessage}.',
    ["storage-delete" /* STORAGE_DELETE */]: 'Error thrown when deleting from storage. Original error: {$originalErrorMessage}.'
};
const ERROR_FACTORY = new _firebase_util__WEBPACK_IMPORTED_MODULE_2__.ErrorFactory('app', 'Firebase', ERRORS);

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
class FirebaseAppImpl {
    constructor(options, config, container) {
        this._isDeleted = false;
        this._options = Object.assign({}, options);
        this._config = Object.assign({}, config);
        this._name = config.name;
        this._automaticDataCollectionEnabled =
            config.automaticDataCollectionEnabled;
        this._container = container;
        this.container.addComponent(new _firebase_component__WEBPACK_IMPORTED_MODULE_0__.Component('app', () => this, "PUBLIC" /* PUBLIC */));
    }
    get automaticDataCollectionEnabled() {
        this.checkDestroyed();
        return this._automaticDataCollectionEnabled;
    }
    set automaticDataCollectionEnabled(val) {
        this.checkDestroyed();
        this._automaticDataCollectionEnabled = val;
    }
    get name() {
        this.checkDestroyed();
        return this._name;
    }
    get options() {
        this.checkDestroyed();
        return this._options;
    }
    get config() {
        this.checkDestroyed();
        return this._config;
    }
    get container() {
        return this._container;
    }
    get isDeleted() {
        return this._isDeleted;
    }
    set isDeleted(val) {
        this._isDeleted = val;
    }
    /**
     * This function will throw an Error if the App has already been deleted -
     * use before performing API actions on the App.
     */
    checkDestroyed() {
        if (this.isDeleted) {
            throw ERROR_FACTORY.create("app-deleted" /* APP_DELETED */, { appName: this._name });
        }
    }
}

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
/**
 * The current SDK version.
 *
 * @public
 */
const SDK_VERSION = version;
function initializeApp(options, rawConfig = {}) {
    if (typeof rawConfig !== 'object') {
        const name = rawConfig;
        rawConfig = { name };
    }
    const config = Object.assign({ name: DEFAULT_ENTRY_NAME, automaticDataCollectionEnabled: false }, rawConfig);
    const name = config.name;
    if (typeof name !== 'string' || !name) {
        throw ERROR_FACTORY.create("bad-app-name" /* BAD_APP_NAME */, {
            appName: String(name)
        });
    }
    const existingApp = _apps.get(name);
    if (existingApp) {
        // return the existing app if options and config deep equal the ones in the existing app.
        if ((0,_firebase_util__WEBPACK_IMPORTED_MODULE_2__.deepEqual)(options, existingApp.options) &&
            (0,_firebase_util__WEBPACK_IMPORTED_MODULE_2__.deepEqual)(config, existingApp.config)) {
            return existingApp;
        }
        else {
            throw ERROR_FACTORY.create("duplicate-app" /* DUPLICATE_APP */, { appName: name });
        }
    }
    const container = new _firebase_component__WEBPACK_IMPORTED_MODULE_0__.ComponentContainer(name);
    for (const component of _components.values()) {
        container.addComponent(component);
    }
    const newApp = new FirebaseAppImpl(options, config, container);
    _apps.set(name, newApp);
    return newApp;
}
/**
 * Retrieves a {@link @firebase/app#FirebaseApp} instance.
 *
 * When called with no arguments, the default app is returned. When an app name
 * is provided, the app corresponding to that name is returned.
 *
 * An exception is thrown if the app being retrieved has not yet been
 * initialized.
 *
 * @example
 * ```javascript
 * // Return the default app
 * const app = getApp();
 * ```
 *
 * @example
 * ```javascript
 * // Return a named app
 * const otherApp = getApp("otherApp");
 * ```
 *
 * @param name - Optional name of the app to return. If no name is
 *   provided, the default is `"[DEFAULT]"`.
 *
 * @returns The app corresponding to the provided app name.
 *   If no app name is provided, the default app is returned.
 *
 * @public
 */
function getApp(name = DEFAULT_ENTRY_NAME) {
    const app = _apps.get(name);
    if (!app) {
        throw ERROR_FACTORY.create("no-app" /* NO_APP */, { appName: name });
    }
    return app;
}
/**
 * A (read-only) array of all initialized apps.
 * @public
 */
function getApps() {
    return Array.from(_apps.values());
}
/**
 * Renders this app unusable and frees the resources of all associated
 * services.
 *
 * @example
 * ```javascript
 * deleteApp(app)
 *   .then(function() {
 *     console.log("App deleted successfully");
 *   })
 *   .catch(function(error) {
 *     console.log("Error deleting app:", error);
 *   });
 * ```
 *
 * @public
 */
async function deleteApp(app) {
    const name = app.name;
    if (_apps.has(name)) {
        _apps.delete(name);
        await Promise.all(app.container
            .getProviders()
            .map(provider => provider.delete()));
        app.isDeleted = true;
    }
}
/**
 * Registers a library's name and version for platform logging purposes.
 * @param library - Name of 1p or 3p library (e.g. firestore, angularfire)
 * @param version - Current version of that library.
 * @param variant - Bundle variant, e.g., node, rn, etc.
 *
 * @public
 */
function registerVersion(libraryKeyOrName, version, variant) {
    var _a;
    // TODO: We can use this check to whitelist strings when/if we set up
    // a good whitelist system.
    let library = (_a = PLATFORM_LOG_STRING[libraryKeyOrName]) !== null && _a !== void 0 ? _a : libraryKeyOrName;
    if (variant) {
        library += `-${variant}`;
    }
    const libraryMismatch = library.match(/\s|\//);
    const versionMismatch = version.match(/\s|\//);
    if (libraryMismatch || versionMismatch) {
        const warning = [
            `Unable to register library "${library}" with version "${version}":`
        ];
        if (libraryMismatch) {
            warning.push(`library name "${library}" contains illegal characters (whitespace or "/")`);
        }
        if (libraryMismatch && versionMismatch) {
            warning.push('and');
        }
        if (versionMismatch) {
            warning.push(`version name "${version}" contains illegal characters (whitespace or "/")`);
        }
        logger.warn(warning.join(' '));
        return;
    }
    _registerComponent(new _firebase_component__WEBPACK_IMPORTED_MODULE_0__.Component(`${library}-version`, () => ({ library, version }), "VERSION" /* VERSION */));
}
/**
 * Sets log handler for all Firebase SDKs.
 * @param logCallback - An optional custom log handler that executes user code whenever
 * the Firebase SDK makes a logging call.
 *
 * @public
 */
function onLog(logCallback, options) {
    if (logCallback !== null && typeof logCallback !== 'function') {
        throw ERROR_FACTORY.create("invalid-log-argument" /* INVALID_LOG_ARGUMENT */);
    }
    (0,_firebase_logger__WEBPACK_IMPORTED_MODULE_1__.setUserLogHandler)(logCallback, options);
}
/**
 * Sets log level for all Firebase SDKs.
 *
 * All of the log types above the current log level are captured (i.e. if
 * you set the log level to `info`, errors are logged, but `debug` and
 * `verbose` logs are not).
 *
 * @public
 */
function setLogLevel(logLevel) {
    (0,_firebase_logger__WEBPACK_IMPORTED_MODULE_1__.setLogLevel)(logLevel);
}

/**
 * @license
 * Copyright 2021 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
const DB_NAME = 'firebase-heartbeat-database';
const DB_VERSION = 1;
const STORE_NAME = 'firebase-heartbeat-store';
let dbPromise = null;
function getDbPromise() {
    if (!dbPromise) {
        dbPromise = (0,_firebase_util__WEBPACK_IMPORTED_MODULE_2__.openDB)(DB_NAME, DB_VERSION, (db, oldVersion) => {
            // We don't use 'break' in this switch statement, the fall-through
            // behavior is what we want, because if there are multiple versions between
            // the old version and the current version, we want ALL the migrations
            // that correspond to those versions to run, not only the last one.
            // eslint-disable-next-line default-case
            switch (oldVersion) {
                case 0:
                    db.createObjectStore(STORE_NAME);
            }
        }).catch(e => {
            throw ERROR_FACTORY.create("storage-open" /* STORAGE_OPEN */, {
                originalErrorMessage: e.message
            });
        });
    }
    return dbPromise;
}
async function readHeartbeatsFromIndexedDB(app) {
    try {
        const db = await getDbPromise();
        return db
            .transaction(STORE_NAME)
            .objectStore(STORE_NAME)
            .get(computeKey(app));
    }
    catch (e) {
        throw ERROR_FACTORY.create("storage-get" /* STORAGE_GET */, {
            originalErrorMessage: e.message
        });
    }
}
async function writeHeartbeatsToIndexedDB(app, heartbeatObject) {
    try {
        const db = await getDbPromise();
        const tx = db.transaction(STORE_NAME, 'readwrite');
        const objectStore = tx.objectStore(STORE_NAME);
        await objectStore.put(heartbeatObject, computeKey(app));
        return tx.complete;
    }
    catch (e) {
        throw ERROR_FACTORY.create("storage-set" /* STORAGE_WRITE */, {
            originalErrorMessage: e.message
        });
    }
}
function computeKey(app) {
    return `${app.name}!${app.options.appId}`;
}

/**
 * @license
 * Copyright 2021 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
const MAX_HEADER_BYTES = 1024;
// 30 days
const STORED_HEARTBEAT_RETENTION_MAX_MILLIS = 30 * 24 * 60 * 60 * 1000;
class HeartbeatServiceImpl {
    constructor(container) {
        this.container = container;
        /**
         * In-memory cache for heartbeats, used by getHeartbeatsHeader() to generate
         * the header string.
         * Stores one record per date. This will be consolidated into the standard
         * format of one record per user agent string before being sent as a header.
         * Populated from indexedDB when the controller is instantiated and should
         * be kept in sync with indexedDB.
         * Leave public for easier testing.
         */
        this._heartbeatsCache = null;
        const app = this.container.getProvider('app').getImmediate();
        this._storage = new HeartbeatStorageImpl(app);
        this._heartbeatsCachePromise = this._storage.read().then(result => {
            this._heartbeatsCache = result;
            return result;
        });
    }
    /**
     * Called to report a heartbeat. The function will generate
     * a HeartbeatsByUserAgent object, update heartbeatsCache, and persist it
     * to IndexedDB.
     * Note that we only store one heartbeat per day. So if a heartbeat for today is
     * already logged, subsequent calls to this function in the same day will be ignored.
     */
    async triggerHeartbeat() {
        const platformLogger = this.container
            .getProvider('platform-logger')
            .getImmediate();
        // This is the "Firebase user agent" string from the platform logger
        // service, not the browser user agent.
        const agent = platformLogger.getPlatformInfoString();
        const date = getUTCDateString();
        if (this._heartbeatsCache === null) {
            this._heartbeatsCache = await this._heartbeatsCachePromise;
        }
        // Do not store a heartbeat if one is already stored for this day
        // or if a header has already been sent today.
        if (this._heartbeatsCache.lastSentHeartbeatDate === date ||
            this._heartbeatsCache.heartbeats.some(singleDateHeartbeat => singleDateHeartbeat.date === date)) {
            return;
        }
        else {
            // There is no entry for this date. Create one.
            this._heartbeatsCache.heartbeats.push({ date, agent });
        }
        // Remove entries older than 30 days.
        this._heartbeatsCache.heartbeats = this._heartbeatsCache.heartbeats.filter(singleDateHeartbeat => {
            const hbTimestamp = new Date(singleDateHeartbeat.date).valueOf();
            const now = Date.now();
            return now - hbTimestamp <= STORED_HEARTBEAT_RETENTION_MAX_MILLIS;
        });
        return this._storage.overwrite(this._heartbeatsCache);
    }
    /**
     * Returns a base64 encoded string which can be attached to the heartbeat-specific header directly.
     * It also clears all heartbeats from memory as well as in IndexedDB.
     *
     * NOTE: Consuming product SDKs should not send the header if this method
     * returns an empty string.
     */
    async getHeartbeatsHeader() {
        if (this._heartbeatsCache === null) {
            await this._heartbeatsCachePromise;
        }
        // If it's still null or the array is empty, there is no data to send.
        if (this._heartbeatsCache === null ||
            this._heartbeatsCache.heartbeats.length === 0) {
            return '';
        }
        const date = getUTCDateString();
        // Extract as many heartbeats from the cache as will fit under the size limit.
        const { heartbeatsToSend, unsentEntries } = extractHeartbeatsForHeader(this._heartbeatsCache.heartbeats);
        const headerString = (0,_firebase_util__WEBPACK_IMPORTED_MODULE_2__.base64urlEncodeWithoutPadding)(JSON.stringify({ version: 2, heartbeats: heartbeatsToSend }));
        // Store last sent date to prevent another being logged/sent for the same day.
        this._heartbeatsCache.lastSentHeartbeatDate = date;
        if (unsentEntries.length > 0) {
            // Store any unsent entries if they exist.
            this._heartbeatsCache.heartbeats = unsentEntries;
            // This seems more likely than emptying the array (below) to lead to some odd state
            // since the cache isn't empty and this will be called again on the next request,
            // and is probably safest if we await it.
            await this._storage.overwrite(this._heartbeatsCache);
        }
        else {
            this._heartbeatsCache.heartbeats = [];
            // Do not wait for this, to reduce latency.
            void this._storage.overwrite(this._heartbeatsCache);
        }
        return headerString;
    }
}
function getUTCDateString() {
    const today = new Date();
    // Returns date format 'YYYY-MM-DD'
    return today.toISOString().substring(0, 10);
}
function extractHeartbeatsForHeader(heartbeatsCache, maxSize = MAX_HEADER_BYTES) {
    // Heartbeats grouped by user agent in the standard format to be sent in
    // the header.
    const heartbeatsToSend = [];
    // Single date format heartbeats that are not sent.
    let unsentEntries = heartbeatsCache.slice();
    for (const singleDateHeartbeat of heartbeatsCache) {
        // Look for an existing entry with the same user agent.
        const heartbeatEntry = heartbeatsToSend.find(hb => hb.agent === singleDateHeartbeat.agent);
        if (!heartbeatEntry) {
            // If no entry for this user agent exists, create one.
            heartbeatsToSend.push({
                agent: singleDateHeartbeat.agent,
                dates: [singleDateHeartbeat.date]
            });
            if (countBytes(heartbeatsToSend) > maxSize) {
                // If the header would exceed max size, remove the added heartbeat
                // entry and stop adding to the header.
                heartbeatsToSend.pop();
                break;
            }
        }
        else {
            heartbeatEntry.dates.push(singleDateHeartbeat.date);
            // If the header would exceed max size, remove the added date
            // and stop adding to the header.
            if (countBytes(heartbeatsToSend) > maxSize) {
                heartbeatEntry.dates.pop();
                break;
            }
        }
        // Pop unsent entry from queue. (Skipped if adding the entry exceeded
        // quota and the loop breaks early.)
        unsentEntries = unsentEntries.slice(1);
    }
    return {
        heartbeatsToSend,
        unsentEntries
    };
}
class HeartbeatStorageImpl {
    constructor(app) {
        this.app = app;
        this._canUseIndexedDBPromise = this.runIndexedDBEnvironmentCheck();
    }
    async runIndexedDBEnvironmentCheck() {
        if (!(0,_firebase_util__WEBPACK_IMPORTED_MODULE_2__.isIndexedDBAvailable)()) {
            return false;
        }
        else {
            return (0,_firebase_util__WEBPACK_IMPORTED_MODULE_2__.validateIndexedDBOpenable)()
                .then(() => true)
                .catch(() => false);
        }
    }
    /**
     * Read all heartbeats.
     */
    async read() {
        const canUseIndexedDB = await this._canUseIndexedDBPromise;
        if (!canUseIndexedDB) {
            return { heartbeats: [] };
        }
        else {
            const idbHeartbeatObject = await readHeartbeatsFromIndexedDB(this.app);
            return idbHeartbeatObject || { heartbeats: [] };
        }
    }
    // overwrite the storage with the provided heartbeats
    async overwrite(heartbeatsObject) {
        var _a;
        const canUseIndexedDB = await this._canUseIndexedDBPromise;
        if (!canUseIndexedDB) {
            return;
        }
        else {
            const existingHeartbeatsObject = await this.read();
            return writeHeartbeatsToIndexedDB(this.app, {
                lastSentHeartbeatDate: (_a = heartbeatsObject.lastSentHeartbeatDate) !== null && _a !== void 0 ? _a : existingHeartbeatsObject.lastSentHeartbeatDate,
                heartbeats: heartbeatsObject.heartbeats
            });
        }
    }
    // add heartbeats
    async add(heartbeatsObject) {
        var _a;
        const canUseIndexedDB = await this._canUseIndexedDBPromise;
        if (!canUseIndexedDB) {
            return;
        }
        else {
            const existingHeartbeatsObject = await this.read();
            return writeHeartbeatsToIndexedDB(this.app, {
                lastSentHeartbeatDate: (_a = heartbeatsObject.lastSentHeartbeatDate) !== null && _a !== void 0 ? _a : existingHeartbeatsObject.lastSentHeartbeatDate,
                heartbeats: [
                    ...existingHeartbeatsObject.heartbeats,
                    ...heartbeatsObject.heartbeats
                ]
            });
        }
    }
}
/**
 * Calculate bytes of a HeartbeatsByUserAgent array after being wrapped
 * in a platform logging header JSON object, stringified, and converted
 * to base 64.
 */
function countBytes(heartbeatsCache) {
    // base64 has a restricted set of characters, all of which should be 1 byte.
    return (0,_firebase_util__WEBPACK_IMPORTED_MODULE_2__.base64urlEncodeWithoutPadding)(
    // heartbeatsCache wrapper properties
    JSON.stringify({ version: 2, heartbeats: heartbeatsCache })).length;
}

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
function registerCoreComponents(variant) {
    _registerComponent(new _firebase_component__WEBPACK_IMPORTED_MODULE_0__.Component('platform-logger', container => new PlatformLoggerServiceImpl(container), "PRIVATE" /* PRIVATE */));
    _registerComponent(new _firebase_component__WEBPACK_IMPORTED_MODULE_0__.Component('heartbeat', container => new HeartbeatServiceImpl(container), "PRIVATE" /* PRIVATE */));
    // Register `app` package.
    registerVersion(name$o, version$1, variant);
    // BUILD_TARGET will be replaced by values like esm5, esm2017, cjs5, etc during the compilation
    registerVersion(name$o, version$1, 'esm2017');
    // Register platform SDK identifier (no version).
    registerVersion('fire-js', '');
}

/**
 * Firebase App
 *
 * @remarks This package coordinates the communication between the different Firebase components
 * @packageDocumentation
 */
registerCoreComponents('');


//# sourceMappingURL=index.esm2017.js.map


/***/ }),

/***/ "./node_modules/@firebase/component/dist/esm/index.esm2017.js":
/*!********************************************************************!*\
  !*** ./node_modules/@firebase/component/dist/esm/index.esm2017.js ***!
  \********************************************************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "Component": () => (/* binding */ Component),
/* harmony export */   "ComponentContainer": () => (/* binding */ ComponentContainer),
/* harmony export */   "Provider": () => (/* binding */ Provider)
/* harmony export */ });
/* harmony import */ var _firebase_util__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @firebase/util */ "./node_modules/@firebase/util/dist/index.esm2017.js");


/**
 * Component for service name T, e.g. `auth`, `auth-internal`
 */
class Component {
    /**
     *
     * @param name The public service name, e.g. app, auth, firestore, database
     * @param instanceFactory Service factory responsible for creating the public interface
     * @param type whether the service provided by the component is public or private
     */
    constructor(name, instanceFactory, type) {
        this.name = name;
        this.instanceFactory = instanceFactory;
        this.type = type;
        this.multipleInstances = false;
        /**
         * Properties to be added to the service namespace
         */
        this.serviceProps = {};
        this.instantiationMode = "LAZY" /* LAZY */;
        this.onInstanceCreated = null;
    }
    setInstantiationMode(mode) {
        this.instantiationMode = mode;
        return this;
    }
    setMultipleInstances(multipleInstances) {
        this.multipleInstances = multipleInstances;
        return this;
    }
    setServiceProps(props) {
        this.serviceProps = props;
        return this;
    }
    setInstanceCreatedCallback(callback) {
        this.onInstanceCreated = callback;
        return this;
    }
}

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
const DEFAULT_ENTRY_NAME = '[DEFAULT]';

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
/**
 * Provider for instance for service name T, e.g. 'auth', 'auth-internal'
 * NameServiceMapping[T] is an alias for the type of the instance
 */
class Provider {
    constructor(name, container) {
        this.name = name;
        this.container = container;
        this.component = null;
        this.instances = new Map();
        this.instancesDeferred = new Map();
        this.instancesOptions = new Map();
        this.onInitCallbacks = new Map();
    }
    /**
     * @param identifier A provider can provide mulitple instances of a service
     * if this.component.multipleInstances is true.
     */
    get(identifier) {
        // if multipleInstances is not supported, use the default name
        const normalizedIdentifier = this.normalizeInstanceIdentifier(identifier);
        if (!this.instancesDeferred.has(normalizedIdentifier)) {
            const deferred = new _firebase_util__WEBPACK_IMPORTED_MODULE_0__.Deferred();
            this.instancesDeferred.set(normalizedIdentifier, deferred);
            if (this.isInitialized(normalizedIdentifier) ||
                this.shouldAutoInitialize()) {
                // initialize the service if it can be auto-initialized
                try {
                    const instance = this.getOrInitializeService({
                        instanceIdentifier: normalizedIdentifier
                    });
                    if (instance) {
                        deferred.resolve(instance);
                    }
                }
                catch (e) {
                    // when the instance factory throws an exception during get(), it should not cause
                    // a fatal error. We just return the unresolved promise in this case.
                }
            }
        }
        return this.instancesDeferred.get(normalizedIdentifier).promise;
    }
    getImmediate(options) {
        var _a;
        // if multipleInstances is not supported, use the default name
        const normalizedIdentifier = this.normalizeInstanceIdentifier(options === null || options === void 0 ? void 0 : options.identifier);
        const optional = (_a = options === null || options === void 0 ? void 0 : options.optional) !== null && _a !== void 0 ? _a : false;
        if (this.isInitialized(normalizedIdentifier) ||
            this.shouldAutoInitialize()) {
            try {
                return this.getOrInitializeService({
                    instanceIdentifier: normalizedIdentifier
                });
            }
            catch (e) {
                if (optional) {
                    return null;
                }
                else {
                    throw e;
                }
            }
        }
        else {
            // In case a component is not initialized and should/can not be auto-initialized at the moment, return null if the optional flag is set, or throw
            if (optional) {
                return null;
            }
            else {
                throw Error(`Service ${this.name} is not available`);
            }
        }
    }
    getComponent() {
        return this.component;
    }
    setComponent(component) {
        if (component.name !== this.name) {
            throw Error(`Mismatching Component ${component.name} for Provider ${this.name}.`);
        }
        if (this.component) {
            throw Error(`Component for ${this.name} has already been provided`);
        }
        this.component = component;
        // return early without attempting to initialize the component if the component requires explicit initialization (calling `Provider.initialize()`)
        if (!this.shouldAutoInitialize()) {
            return;
        }
        // if the service is eager, initialize the default instance
        if (isComponentEager(component)) {
            try {
                this.getOrInitializeService({ instanceIdentifier: DEFAULT_ENTRY_NAME });
            }
            catch (e) {
                // when the instance factory for an eager Component throws an exception during the eager
                // initialization, it should not cause a fatal error.
                // TODO: Investigate if we need to make it configurable, because some component may want to cause
                // a fatal error in this case?
            }
        }
        // Create service instances for the pending promises and resolve them
        // NOTE: if this.multipleInstances is false, only the default instance will be created
        // and all promises with resolve with it regardless of the identifier.
        for (const [instanceIdentifier, instanceDeferred] of this.instancesDeferred.entries()) {
            const normalizedIdentifier = this.normalizeInstanceIdentifier(instanceIdentifier);
            try {
                // `getOrInitializeService()` should always return a valid instance since a component is guaranteed. use ! to make typescript happy.
                const instance = this.getOrInitializeService({
                    instanceIdentifier: normalizedIdentifier
                });
                instanceDeferred.resolve(instance);
            }
            catch (e) {
                // when the instance factory throws an exception, it should not cause
                // a fatal error. We just leave the promise unresolved.
            }
        }
    }
    clearInstance(identifier = DEFAULT_ENTRY_NAME) {
        this.instancesDeferred.delete(identifier);
        this.instancesOptions.delete(identifier);
        this.instances.delete(identifier);
    }
    // app.delete() will call this method on every provider to delete the services
    // TODO: should we mark the provider as deleted?
    async delete() {
        const services = Array.from(this.instances.values());
        await Promise.all([
            ...services
                .filter(service => 'INTERNAL' in service) // legacy services
                // eslint-disable-next-line @typescript-eslint/no-explicit-any
                .map(service => service.INTERNAL.delete()),
            ...services
                .filter(service => '_delete' in service) // modularized services
                // eslint-disable-next-line @typescript-eslint/no-explicit-any
                .map(service => service._delete())
        ]);
    }
    isComponentSet() {
        return this.component != null;
    }
    isInitialized(identifier = DEFAULT_ENTRY_NAME) {
        return this.instances.has(identifier);
    }
    getOptions(identifier = DEFAULT_ENTRY_NAME) {
        return this.instancesOptions.get(identifier) || {};
    }
    initialize(opts = {}) {
        const { options = {} } = opts;
        const normalizedIdentifier = this.normalizeInstanceIdentifier(opts.instanceIdentifier);
        if (this.isInitialized(normalizedIdentifier)) {
            throw Error(`${this.name}(${normalizedIdentifier}) has already been initialized`);
        }
        if (!this.isComponentSet()) {
            throw Error(`Component ${this.name} has not been registered yet`);
        }
        const instance = this.getOrInitializeService({
            instanceIdentifier: normalizedIdentifier,
            options
        });
        // resolve any pending promise waiting for the service instance
        for (const [instanceIdentifier, instanceDeferred] of this.instancesDeferred.entries()) {
            const normalizedDeferredIdentifier = this.normalizeInstanceIdentifier(instanceIdentifier);
            if (normalizedIdentifier === normalizedDeferredIdentifier) {
                instanceDeferred.resolve(instance);
            }
        }
        return instance;
    }
    /**
     *
     * @param callback - a function that will be invoked  after the provider has been initialized by calling provider.initialize().
     * The function is invoked SYNCHRONOUSLY, so it should not execute any longrunning tasks in order to not block the program.
     *
     * @param identifier An optional instance identifier
     * @returns a function to unregister the callback
     */
    onInit(callback, identifier) {
        var _a;
        const normalizedIdentifier = this.normalizeInstanceIdentifier(identifier);
        const existingCallbacks = (_a = this.onInitCallbacks.get(normalizedIdentifier)) !== null && _a !== void 0 ? _a : new Set();
        existingCallbacks.add(callback);
        this.onInitCallbacks.set(normalizedIdentifier, existingCallbacks);
        const existingInstance = this.instances.get(normalizedIdentifier);
        if (existingInstance) {
            callback(existingInstance, normalizedIdentifier);
        }
        return () => {
            existingCallbacks.delete(callback);
        };
    }
    /**
     * Invoke onInit callbacks synchronously
     * @param instance the service instance`
     */
    invokeOnInitCallbacks(instance, identifier) {
        const callbacks = this.onInitCallbacks.get(identifier);
        if (!callbacks) {
            return;
        }
        for (const callback of callbacks) {
            try {
                callback(instance, identifier);
            }
            catch (_a) {
                // ignore errors in the onInit callback
            }
        }
    }
    getOrInitializeService({ instanceIdentifier, options = {} }) {
        let instance = this.instances.get(instanceIdentifier);
        if (!instance && this.component) {
            instance = this.component.instanceFactory(this.container, {
                instanceIdentifier: normalizeIdentifierForFactory(instanceIdentifier),
                options
            });
            this.instances.set(instanceIdentifier, instance);
            this.instancesOptions.set(instanceIdentifier, options);
            /**
             * Invoke onInit listeners.
             * Note this.component.onInstanceCreated is different, which is used by the component creator,
             * while onInit listeners are registered by consumers of the provider.
             */
            this.invokeOnInitCallbacks(instance, instanceIdentifier);
            /**
             * Order is important
             * onInstanceCreated() should be called after this.instances.set(instanceIdentifier, instance); which
             * makes `isInitialized()` return true.
             */
            if (this.component.onInstanceCreated) {
                try {
                    this.component.onInstanceCreated(this.container, instanceIdentifier, instance);
                }
                catch (_a) {
                    // ignore errors in the onInstanceCreatedCallback
                }
            }
        }
        return instance || null;
    }
    normalizeInstanceIdentifier(identifier = DEFAULT_ENTRY_NAME) {
        if (this.component) {
            return this.component.multipleInstances ? identifier : DEFAULT_ENTRY_NAME;
        }
        else {
            return identifier; // assume multiple instances are supported before the component is provided.
        }
    }
    shouldAutoInitialize() {
        return (!!this.component &&
            this.component.instantiationMode !== "EXPLICIT" /* EXPLICIT */);
    }
}
// undefined should be passed to the service factory for the default instance
function normalizeIdentifierForFactory(identifier) {
    return identifier === DEFAULT_ENTRY_NAME ? undefined : identifier;
}
function isComponentEager(component) {
    return component.instantiationMode === "EAGER" /* EAGER */;
}

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
/**
 * ComponentContainer that provides Providers for service name T, e.g. `auth`, `auth-internal`
 */
class ComponentContainer {
    constructor(name) {
        this.name = name;
        this.providers = new Map();
    }
    /**
     *
     * @param component Component being added
     * @param overwrite When a component with the same name has already been registered,
     * if overwrite is true: overwrite the existing component with the new component and create a new
     * provider with the new component. It can be useful in tests where you want to use different mocks
     * for different tests.
     * if overwrite is false: throw an exception
     */
    addComponent(component) {
        const provider = this.getProvider(component.name);
        if (provider.isComponentSet()) {
            throw new Error(`Component ${component.name} has already been registered with ${this.name}`);
        }
        provider.setComponent(component);
    }
    addOrOverwriteComponent(component) {
        const provider = this.getProvider(component.name);
        if (provider.isComponentSet()) {
            // delete the existing provider from the container, so we can register the new component
            this.providers.delete(component.name);
        }
        this.addComponent(component);
    }
    /**
     * getProvider provides a type safe interface where it can only be called with a field name
     * present in NameServiceMapping interface.
     *
     * Firebase SDKs providing services should extend NameServiceMapping interface to register
     * themselves.
     */
    getProvider(name) {
        if (this.providers.has(name)) {
            return this.providers.get(name);
        }
        // create a Provider for a service that hasn't registered with Firebase
        const provider = new Provider(name, this);
        this.providers.set(name, provider);
        return provider;
    }
    getProviders() {
        return Array.from(this.providers.values());
    }
}


//# sourceMappingURL=index.esm2017.js.map


/***/ }),

/***/ "./node_modules/@firebase/installations/dist/esm/index.esm2017.js":
/*!************************************************************************!*\
  !*** ./node_modules/@firebase/installations/dist/esm/index.esm2017.js ***!
  \************************************************************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "deleteInstallations": () => (/* binding */ deleteInstallations),
/* harmony export */   "getId": () => (/* binding */ getId),
/* harmony export */   "getInstallations": () => (/* binding */ getInstallations),
/* harmony export */   "getToken": () => (/* binding */ getToken),
/* harmony export */   "onIdChange": () => (/* binding */ onIdChange)
/* harmony export */ });
/* harmony import */ var _firebase_app__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @firebase/app */ "./node_modules/@firebase/app/dist/esm/index.esm2017.js");
/* harmony import */ var _firebase_component__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @firebase/component */ "./node_modules/@firebase/component/dist/esm/index.esm2017.js");
/* harmony import */ var _firebase_util__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @firebase/util */ "./node_modules/@firebase/util/dist/index.esm2017.js");




const name = "@firebase/installations";
const version = "0.5.8";

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
const PENDING_TIMEOUT_MS = 10000;
const PACKAGE_VERSION = `w:${version}`;
const INTERNAL_AUTH_VERSION = 'FIS_v2';
const INSTALLATIONS_API_URL = 'https://firebaseinstallations.googleapis.com/v1';
const TOKEN_EXPIRATION_BUFFER = 60 * 60 * 1000; // One hour
const SERVICE = 'installations';
const SERVICE_NAME = 'Installations';

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
const ERROR_DESCRIPTION_MAP = {
    ["missing-app-config-values" /* MISSING_APP_CONFIG_VALUES */]: 'Missing App configuration value: "{$valueName}"',
    ["not-registered" /* NOT_REGISTERED */]: 'Firebase Installation is not registered.',
    ["installation-not-found" /* INSTALLATION_NOT_FOUND */]: 'Firebase Installation not found.',
    ["request-failed" /* REQUEST_FAILED */]: '{$requestName} request failed with error "{$serverCode} {$serverStatus}: {$serverMessage}"',
    ["app-offline" /* APP_OFFLINE */]: 'Could not process request. Application offline.',
    ["delete-pending-registration" /* DELETE_PENDING_REGISTRATION */]: "Can't delete installation while there is a pending registration request."
};
const ERROR_FACTORY = new _firebase_util__WEBPACK_IMPORTED_MODULE_2__.ErrorFactory(SERVICE, SERVICE_NAME, ERROR_DESCRIPTION_MAP);
/** Returns true if error is a FirebaseError that is based on an error from the server. */
function isServerError(error) {
    return (error instanceof _firebase_util__WEBPACK_IMPORTED_MODULE_2__.FirebaseError &&
        error.code.includes("request-failed" /* REQUEST_FAILED */));
}

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
function getInstallationsEndpoint({ projectId }) {
    return `${INSTALLATIONS_API_URL}/projects/${projectId}/installations`;
}
function extractAuthTokenInfoFromResponse(response) {
    return {
        token: response.token,
        requestStatus: 2 /* COMPLETED */,
        expiresIn: getExpiresInFromResponseExpiresIn(response.expiresIn),
        creationTime: Date.now()
    };
}
async function getErrorFromResponse(requestName, response) {
    const responseJson = await response.json();
    const errorData = responseJson.error;
    return ERROR_FACTORY.create("request-failed" /* REQUEST_FAILED */, {
        requestName,
        serverCode: errorData.code,
        serverMessage: errorData.message,
        serverStatus: errorData.status
    });
}
function getHeaders({ apiKey }) {
    return new Headers({
        'Content-Type': 'application/json',
        Accept: 'application/json',
        'x-goog-api-key': apiKey
    });
}
function getHeadersWithAuth(appConfig, { refreshToken }) {
    const headers = getHeaders(appConfig);
    headers.append('Authorization', getAuthorizationHeader(refreshToken));
    return headers;
}
/**
 * Calls the passed in fetch wrapper and returns the response.
 * If the returned response has a status of 5xx, re-runs the function once and
 * returns the response.
 */
async function retryIfServerError(fn) {
    const result = await fn();
    if (result.status >= 500 && result.status < 600) {
        // Internal Server Error. Retry request.
        return fn();
    }
    return result;
}
function getExpiresInFromResponseExpiresIn(responseExpiresIn) {
    // This works because the server will never respond with fractions of a second.
    return Number(responseExpiresIn.replace('s', '000'));
}
function getAuthorizationHeader(refreshToken) {
    return `${INTERNAL_AUTH_VERSION} ${refreshToken}`;
}

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
async function createInstallationRequest({ appConfig, heartbeatServiceProvider }, { fid }) {
    const endpoint = getInstallationsEndpoint(appConfig);
    const headers = getHeaders(appConfig);
    // If heartbeat service exists, add the heartbeat string to the header.
    const heartbeatService = heartbeatServiceProvider.getImmediate({
        optional: true
    });
    if (heartbeatService) {
        const heartbeatsHeader = await heartbeatService.getHeartbeatsHeader();
        if (heartbeatsHeader) {
            headers.append('x-firebase-client', heartbeatsHeader);
        }
    }
    const body = {
        fid,
        authVersion: INTERNAL_AUTH_VERSION,
        appId: appConfig.appId,
        sdkVersion: PACKAGE_VERSION
    };
    const request = {
        method: 'POST',
        headers,
        body: JSON.stringify(body)
    };
    const response = await retryIfServerError(() => fetch(endpoint, request));
    if (response.ok) {
        const responseValue = await response.json();
        const registeredInstallationEntry = {
            fid: responseValue.fid || fid,
            registrationStatus: 2 /* COMPLETED */,
            refreshToken: responseValue.refreshToken,
            authToken: extractAuthTokenInfoFromResponse(responseValue.authToken)
        };
        return registeredInstallationEntry;
    }
    else {
        throw await getErrorFromResponse('Create Installation', response);
    }
}

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
/** Returns a promise that resolves after given time passes. */
function sleep(ms) {
    return new Promise(resolve => {
        setTimeout(resolve, ms);
    });
}

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
function bufferToBase64UrlSafe(array) {
    const b64 = btoa(String.fromCharCode(...array));
    return b64.replace(/\+/g, '-').replace(/\//g, '_');
}

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
const VALID_FID_PATTERN = /^[cdef][\w-]{21}$/;
const INVALID_FID = '';
/**
 * Generates a new FID using random values from Web Crypto API.
 * Returns an empty string if FID generation fails for any reason.
 */
function generateFid() {
    try {
        // A valid FID has exactly 22 base64 characters, which is 132 bits, or 16.5
        // bytes. our implementation generates a 17 byte array instead.
        const fidByteArray = new Uint8Array(17);
        const crypto = self.crypto || self.msCrypto;
        crypto.getRandomValues(fidByteArray);
        // Replace the first 4 random bits with the constant FID header of 0b0111.
        fidByteArray[0] = 0b01110000 + (fidByteArray[0] % 0b00010000);
        const fid = encode(fidByteArray);
        return VALID_FID_PATTERN.test(fid) ? fid : INVALID_FID;
    }
    catch (_a) {
        // FID generation errored
        return INVALID_FID;
    }
}
/** Converts a FID Uint8Array to a base64 string representation. */
function encode(fidByteArray) {
    const b64String = bufferToBase64UrlSafe(fidByteArray);
    // Remove the 23rd character that was added because of the extra 4 bits at the
    // end of our 17 byte array, and the '=' padding.
    return b64String.substr(0, 22);
}

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
/** Returns a string key that can be used to identify the app. */
function getKey(appConfig) {
    return `${appConfig.appName}!${appConfig.appId}`;
}

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
const fidChangeCallbacks = new Map();
/**
 * Calls the onIdChange callbacks with the new FID value, and broadcasts the
 * change to other tabs.
 */
function fidChanged(appConfig, fid) {
    const key = getKey(appConfig);
    callFidChangeCallbacks(key, fid);
    broadcastFidChange(key, fid);
}
function addCallback(appConfig, callback) {
    // Open the broadcast channel if it's not already open,
    // to be able to listen to change events from other tabs.
    getBroadcastChannel();
    const key = getKey(appConfig);
    let callbackSet = fidChangeCallbacks.get(key);
    if (!callbackSet) {
        callbackSet = new Set();
        fidChangeCallbacks.set(key, callbackSet);
    }
    callbackSet.add(callback);
}
function removeCallback(appConfig, callback) {
    const key = getKey(appConfig);
    const callbackSet = fidChangeCallbacks.get(key);
    if (!callbackSet) {
        return;
    }
    callbackSet.delete(callback);
    if (callbackSet.size === 0) {
        fidChangeCallbacks.delete(key);
    }
    // Close broadcast channel if there are no more callbacks.
    closeBroadcastChannel();
}
function callFidChangeCallbacks(key, fid) {
    const callbacks = fidChangeCallbacks.get(key);
    if (!callbacks) {
        return;
    }
    for (const callback of callbacks) {
        callback(fid);
    }
}
function broadcastFidChange(key, fid) {
    const channel = getBroadcastChannel();
    if (channel) {
        channel.postMessage({ key, fid });
    }
    closeBroadcastChannel();
}
let broadcastChannel = null;
/** Opens and returns a BroadcastChannel if it is supported by the browser. */
function getBroadcastChannel() {
    if (!broadcastChannel && 'BroadcastChannel' in self) {
        broadcastChannel = new BroadcastChannel('[Firebase] FID Change');
        broadcastChannel.onmessage = e => {
            callFidChangeCallbacks(e.data.key, e.data.fid);
        };
    }
    return broadcastChannel;
}
function closeBroadcastChannel() {
    if (fidChangeCallbacks.size === 0 && broadcastChannel) {
        broadcastChannel.close();
        broadcastChannel = null;
    }
}

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
const DATABASE_NAME = 'firebase-installations-database';
const DATABASE_VERSION = 1;
const OBJECT_STORE_NAME = 'firebase-installations-store';
let dbPromise = null;
function getDbPromise() {
    if (!dbPromise) {
        dbPromise = (0,_firebase_util__WEBPACK_IMPORTED_MODULE_2__.openDB)(DATABASE_NAME, DATABASE_VERSION, (db, oldVersion) => {
            // We don't use 'break' in this switch statement, the fall-through
            // behavior is what we want, because if there are multiple versions between
            // the old version and the current version, we want ALL the migrations
            // that correspond to those versions to run, not only the last one.
            // eslint-disable-next-line default-case
            switch (oldVersion) {
                case 0:
                    db.createObjectStore(OBJECT_STORE_NAME);
            }
        });
    }
    return dbPromise;
}
/** Assigns or overwrites the record for the given key with the given value. */
async function set(appConfig, value) {
    const key = getKey(appConfig);
    const db = await getDbPromise();
    const tx = db.transaction(OBJECT_STORE_NAME, 'readwrite');
    const objectStore = tx.objectStore(OBJECT_STORE_NAME);
    const oldValue = (await objectStore.get(key));
    await objectStore.put(value, key);
    await tx.complete;
    if (!oldValue || oldValue.fid !== value.fid) {
        fidChanged(appConfig, value.fid);
    }
    return value;
}
/** Removes record(s) from the objectStore that match the given key. */
async function remove(appConfig) {
    const key = getKey(appConfig);
    const db = await getDbPromise();
    const tx = db.transaction(OBJECT_STORE_NAME, 'readwrite');
    await tx.objectStore(OBJECT_STORE_NAME).delete(key);
    await tx.complete;
}
/**
 * Atomically updates a record with the result of updateFn, which gets
 * called with the current value. If newValue is undefined, the record is
 * deleted instead.
 * @return Updated value
 */
async function update(appConfig, updateFn) {
    const key = getKey(appConfig);
    const db = await getDbPromise();
    const tx = db.transaction(OBJECT_STORE_NAME, 'readwrite');
    const store = tx.objectStore(OBJECT_STORE_NAME);
    const oldValue = (await store.get(key));
    const newValue = updateFn(oldValue);
    if (newValue === undefined) {
        await store.delete(key);
    }
    else {
        await store.put(newValue, key);
    }
    await tx.complete;
    if (newValue && (!oldValue || oldValue.fid !== newValue.fid)) {
        fidChanged(appConfig, newValue.fid);
    }
    return newValue;
}

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
/**
 * Updates and returns the InstallationEntry from the database.
 * Also triggers a registration request if it is necessary and possible.
 */
async function getInstallationEntry(installations) {
    let registrationPromise;
    const installationEntry = await update(installations.appConfig, oldEntry => {
        const installationEntry = updateOrCreateInstallationEntry(oldEntry);
        const entryWithPromise = triggerRegistrationIfNecessary(installations, installationEntry);
        registrationPromise = entryWithPromise.registrationPromise;
        return entryWithPromise.installationEntry;
    });
    if (installationEntry.fid === INVALID_FID) {
        // FID generation failed. Waiting for the FID from the server.
        return { installationEntry: await registrationPromise };
    }
    return {
        installationEntry,
        registrationPromise
    };
}
/**
 * Creates a new Installation Entry if one does not exist.
 * Also clears timed out pending requests.
 */
function updateOrCreateInstallationEntry(oldEntry) {
    const entry = oldEntry || {
        fid: generateFid(),
        registrationStatus: 0 /* NOT_STARTED */
    };
    return clearTimedOutRequest(entry);
}
/**
 * If the Firebase Installation is not registered yet, this will trigger the
 * registration and return an InProgressInstallationEntry.
 *
 * If registrationPromise does not exist, the installationEntry is guaranteed
 * to be registered.
 */
function triggerRegistrationIfNecessary(installations, installationEntry) {
    if (installationEntry.registrationStatus === 0 /* NOT_STARTED */) {
        if (!navigator.onLine) {
            // Registration required but app is offline.
            const registrationPromiseWithError = Promise.reject(ERROR_FACTORY.create("app-offline" /* APP_OFFLINE */));
            return {
                installationEntry,
                registrationPromise: registrationPromiseWithError
            };
        }
        // Try registering. Change status to IN_PROGRESS.
        const inProgressEntry = {
            fid: installationEntry.fid,
            registrationStatus: 1 /* IN_PROGRESS */,
            registrationTime: Date.now()
        };
        const registrationPromise = registerInstallation(installations, inProgressEntry);
        return { installationEntry: inProgressEntry, registrationPromise };
    }
    else if (installationEntry.registrationStatus === 1 /* IN_PROGRESS */) {
        return {
            installationEntry,
            registrationPromise: waitUntilFidRegistration(installations)
        };
    }
    else {
        return { installationEntry };
    }
}
/** This will be executed only once for each new Firebase Installation. */
async function registerInstallation(installations, installationEntry) {
    try {
        const registeredInstallationEntry = await createInstallationRequest(installations, installationEntry);
        return set(installations.appConfig, registeredInstallationEntry);
    }
    catch (e) {
        if (isServerError(e) && e.customData.serverCode === 409) {
            // Server returned a "FID can not be used" error.
            // Generate a new ID next time.
            await remove(installations.appConfig);
        }
        else {
            // Registration failed. Set FID as not registered.
            await set(installations.appConfig, {
                fid: installationEntry.fid,
                registrationStatus: 0 /* NOT_STARTED */
            });
        }
        throw e;
    }
}
/** Call if FID registration is pending in another request. */
async function waitUntilFidRegistration(installations) {
    // Unfortunately, there is no way of reliably observing when a value in
    // IndexedDB changes (yet, see https://github.com/WICG/indexed-db-observers),
    // so we need to poll.
    let entry = await updateInstallationRequest(installations.appConfig);
    while (entry.registrationStatus === 1 /* IN_PROGRESS */) {
        // createInstallation request still in progress.
        await sleep(100);
        entry = await updateInstallationRequest(installations.appConfig);
    }
    if (entry.registrationStatus === 0 /* NOT_STARTED */) {
        // The request timed out or failed in a different call. Try again.
        const { installationEntry, registrationPromise } = await getInstallationEntry(installations);
        if (registrationPromise) {
            return registrationPromise;
        }
        else {
            // if there is no registrationPromise, entry is registered.
            return installationEntry;
        }
    }
    return entry;
}
/**
 * Called only if there is a CreateInstallation request in progress.
 *
 * Updates the InstallationEntry in the DB based on the status of the
 * CreateInstallation request.
 *
 * Returns the updated InstallationEntry.
 */
function updateInstallationRequest(appConfig) {
    return update(appConfig, oldEntry => {
        if (!oldEntry) {
            throw ERROR_FACTORY.create("installation-not-found" /* INSTALLATION_NOT_FOUND */);
        }
        return clearTimedOutRequest(oldEntry);
    });
}
function clearTimedOutRequest(entry) {
    if (hasInstallationRequestTimedOut(entry)) {
        return {
            fid: entry.fid,
            registrationStatus: 0 /* NOT_STARTED */
        };
    }
    return entry;
}
function hasInstallationRequestTimedOut(installationEntry) {
    return (installationEntry.registrationStatus === 1 /* IN_PROGRESS */ &&
        installationEntry.registrationTime + PENDING_TIMEOUT_MS < Date.now());
}

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
async function generateAuthTokenRequest({ appConfig, heartbeatServiceProvider }, installationEntry) {
    const endpoint = getGenerateAuthTokenEndpoint(appConfig, installationEntry);
    const headers = getHeadersWithAuth(appConfig, installationEntry);
    // If heartbeat service exists, add the heartbeat string to the header.
    const heartbeatService = heartbeatServiceProvider.getImmediate({
        optional: true
    });
    if (heartbeatService) {
        const heartbeatsHeader = await heartbeatService.getHeartbeatsHeader();
        if (heartbeatsHeader) {
            headers.append('x-firebase-client', heartbeatsHeader);
        }
    }
    const body = {
        installation: {
            sdkVersion: PACKAGE_VERSION,
            appId: appConfig.appId
        }
    };
    const request = {
        method: 'POST',
        headers,
        body: JSON.stringify(body)
    };
    const response = await retryIfServerError(() => fetch(endpoint, request));
    if (response.ok) {
        const responseValue = await response.json();
        const completedAuthToken = extractAuthTokenInfoFromResponse(responseValue);
        return completedAuthToken;
    }
    else {
        throw await getErrorFromResponse('Generate Auth Token', response);
    }
}
function getGenerateAuthTokenEndpoint(appConfig, { fid }) {
    return `${getInstallationsEndpoint(appConfig)}/${fid}/authTokens:generate`;
}

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
/**
 * Returns a valid authentication token for the installation. Generates a new
 * token if one doesn't exist, is expired or about to expire.
 *
 * Should only be called if the Firebase Installation is registered.
 */
async function refreshAuthToken(installations, forceRefresh = false) {
    let tokenPromise;
    const entry = await update(installations.appConfig, oldEntry => {
        if (!isEntryRegistered(oldEntry)) {
            throw ERROR_FACTORY.create("not-registered" /* NOT_REGISTERED */);
        }
        const oldAuthToken = oldEntry.authToken;
        if (!forceRefresh && isAuthTokenValid(oldAuthToken)) {
            // There is a valid token in the DB.
            return oldEntry;
        }
        else if (oldAuthToken.requestStatus === 1 /* IN_PROGRESS */) {
            // There already is a token request in progress.
            tokenPromise = waitUntilAuthTokenRequest(installations, forceRefresh);
            return oldEntry;
        }
        else {
            // No token or token expired.
            if (!navigator.onLine) {
                throw ERROR_FACTORY.create("app-offline" /* APP_OFFLINE */);
            }
            const inProgressEntry = makeAuthTokenRequestInProgressEntry(oldEntry);
            tokenPromise = fetchAuthTokenFromServer(installations, inProgressEntry);
            return inProgressEntry;
        }
    });
    const authToken = tokenPromise
        ? await tokenPromise
        : entry.authToken;
    return authToken;
}
/**
 * Call only if FID is registered and Auth Token request is in progress.
 *
 * Waits until the current pending request finishes. If the request times out,
 * tries once in this thread as well.
 */
async function waitUntilAuthTokenRequest(installations, forceRefresh) {
    // Unfortunately, there is no way of reliably observing when a value in
    // IndexedDB changes (yet, see https://github.com/WICG/indexed-db-observers),
    // so we need to poll.
    let entry = await updateAuthTokenRequest(installations.appConfig);
    while (entry.authToken.requestStatus === 1 /* IN_PROGRESS */) {
        // generateAuthToken still in progress.
        await sleep(100);
        entry = await updateAuthTokenRequest(installations.appConfig);
    }
    const authToken = entry.authToken;
    if (authToken.requestStatus === 0 /* NOT_STARTED */) {
        // The request timed out or failed in a different call. Try again.
        return refreshAuthToken(installations, forceRefresh);
    }
    else {
        return authToken;
    }
}
/**
 * Called only if there is a GenerateAuthToken request in progress.
 *
 * Updates the InstallationEntry in the DB based on the status of the
 * GenerateAuthToken request.
 *
 * Returns the updated InstallationEntry.
 */
function updateAuthTokenRequest(appConfig) {
    return update(appConfig, oldEntry => {
        if (!isEntryRegistered(oldEntry)) {
            throw ERROR_FACTORY.create("not-registered" /* NOT_REGISTERED */);
        }
        const oldAuthToken = oldEntry.authToken;
        if (hasAuthTokenRequestTimedOut(oldAuthToken)) {
            return Object.assign(Object.assign({}, oldEntry), { authToken: { requestStatus: 0 /* NOT_STARTED */ } });
        }
        return oldEntry;
    });
}
async function fetchAuthTokenFromServer(installations, installationEntry) {
    try {
        const authToken = await generateAuthTokenRequest(installations, installationEntry);
        const updatedInstallationEntry = Object.assign(Object.assign({}, installationEntry), { authToken });
        await set(installations.appConfig, updatedInstallationEntry);
        return authToken;
    }
    catch (e) {
        if (isServerError(e) &&
            (e.customData.serverCode === 401 || e.customData.serverCode === 404)) {
            // Server returned a "FID not found" or a "Invalid authentication" error.
            // Generate a new ID next time.
            await remove(installations.appConfig);
        }
        else {
            const updatedInstallationEntry = Object.assign(Object.assign({}, installationEntry), { authToken: { requestStatus: 0 /* NOT_STARTED */ } });
            await set(installations.appConfig, updatedInstallationEntry);
        }
        throw e;
    }
}
function isEntryRegistered(installationEntry) {
    return (installationEntry !== undefined &&
        installationEntry.registrationStatus === 2 /* COMPLETED */);
}
function isAuthTokenValid(authToken) {
    return (authToken.requestStatus === 2 /* COMPLETED */ &&
        !isAuthTokenExpired(authToken));
}
function isAuthTokenExpired(authToken) {
    const now = Date.now();
    return (now < authToken.creationTime ||
        authToken.creationTime + authToken.expiresIn < now + TOKEN_EXPIRATION_BUFFER);
}
/** Returns an updated InstallationEntry with an InProgressAuthToken. */
function makeAuthTokenRequestInProgressEntry(oldEntry) {
    const inProgressAuthToken = {
        requestStatus: 1 /* IN_PROGRESS */,
        requestTime: Date.now()
    };
    return Object.assign(Object.assign({}, oldEntry), { authToken: inProgressAuthToken });
}
function hasAuthTokenRequestTimedOut(authToken) {
    return (authToken.requestStatus === 1 /* IN_PROGRESS */ &&
        authToken.requestTime + PENDING_TIMEOUT_MS < Date.now());
}

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
/**
 * Creates a Firebase Installation if there isn't one for the app and
 * returns the Installation ID.
 * @param installations - The `Installations` instance.
 *
 * @public
 */
async function getId(installations) {
    const installationsImpl = installations;
    const { installationEntry, registrationPromise } = await getInstallationEntry(installationsImpl);
    if (registrationPromise) {
        registrationPromise.catch(console.error);
    }
    else {
        // If the installation is already registered, update the authentication
        // token if needed.
        refreshAuthToken(installationsImpl).catch(console.error);
    }
    return installationEntry.fid;
}

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
/**
 * Returns a Firebase Installations auth token, identifying the current
 * Firebase Installation.
 * @param installations - The `Installations` instance.
 * @param forceRefresh - Force refresh regardless of token expiration.
 *
 * @public
 */
async function getToken(installations, forceRefresh = false) {
    const installationsImpl = installations;
    await completeInstallationRegistration(installationsImpl);
    // At this point we either have a Registered Installation in the DB, or we've
    // already thrown an error.
    const authToken = await refreshAuthToken(installationsImpl, forceRefresh);
    return authToken.token;
}
async function completeInstallationRegistration(installations) {
    const { registrationPromise } = await getInstallationEntry(installations);
    if (registrationPromise) {
        // A createInstallation request is in progress. Wait until it finishes.
        await registrationPromise;
    }
}

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
async function deleteInstallationRequest(appConfig, installationEntry) {
    const endpoint = getDeleteEndpoint(appConfig, installationEntry);
    const headers = getHeadersWithAuth(appConfig, installationEntry);
    const request = {
        method: 'DELETE',
        headers
    };
    const response = await retryIfServerError(() => fetch(endpoint, request));
    if (!response.ok) {
        throw await getErrorFromResponse('Delete Installation', response);
    }
}
function getDeleteEndpoint(appConfig, { fid }) {
    return `${getInstallationsEndpoint(appConfig)}/${fid}`;
}

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
/**
 * Deletes the Firebase Installation and all associated data.
 * @param installations - The `Installations` instance.
 *
 * @public
 */
async function deleteInstallations(installations) {
    const { appConfig } = installations;
    const entry = await update(appConfig, oldEntry => {
        if (oldEntry && oldEntry.registrationStatus === 0 /* NOT_STARTED */) {
            // Delete the unregistered entry without sending a deleteInstallation request.
            return undefined;
        }
        return oldEntry;
    });
    if (entry) {
        if (entry.registrationStatus === 1 /* IN_PROGRESS */) {
            // Can't delete while trying to register.
            throw ERROR_FACTORY.create("delete-pending-registration" /* DELETE_PENDING_REGISTRATION */);
        }
        else if (entry.registrationStatus === 2 /* COMPLETED */) {
            if (!navigator.onLine) {
                throw ERROR_FACTORY.create("app-offline" /* APP_OFFLINE */);
            }
            else {
                await deleteInstallationRequest(appConfig, entry);
                await remove(appConfig);
            }
        }
    }
}

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
/**
 * Sets a new callback that will get called when Installation ID changes.
 * Returns an unsubscribe function that will remove the callback when called.
 * @param installations - The `Installations` instance.
 * @param callback - The callback function that is invoked when FID changes.
 * @returns A function that can be called to unsubscribe.
 *
 * @public
 */
function onIdChange(installations, callback) {
    const { appConfig } = installations;
    addCallback(appConfig, callback);
    return () => {
        removeCallback(appConfig, callback);
    };
}

/**
 * @license
 * Copyright 2020 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
/**
 * Returns an instance of {@link Installations} associated with the given
 * {@link @firebase/app#FirebaseApp} instance.
 * @param app - The {@link @firebase/app#FirebaseApp} instance.
 *
 * @public
 */
function getInstallations(app = (0,_firebase_app__WEBPACK_IMPORTED_MODULE_0__.getApp)()) {
    const installationsImpl = (0,_firebase_app__WEBPACK_IMPORTED_MODULE_0__._getProvider)(app, 'installations').getImmediate();
    return installationsImpl;
}

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
function extractAppConfig(app) {
    if (!app || !app.options) {
        throw getMissingValueError('App Configuration');
    }
    if (!app.name) {
        throw getMissingValueError('App Name');
    }
    // Required app config keys
    const configKeys = [
        'projectId',
        'apiKey',
        'appId'
    ];
    for (const keyName of configKeys) {
        if (!app.options[keyName]) {
            throw getMissingValueError(keyName);
        }
    }
    return {
        appName: app.name,
        projectId: app.options.projectId,
        apiKey: app.options.apiKey,
        appId: app.options.appId
    };
}
function getMissingValueError(valueName) {
    return ERROR_FACTORY.create("missing-app-config-values" /* MISSING_APP_CONFIG_VALUES */, {
        valueName
    });
}

/**
 * @license
 * Copyright 2020 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
const INSTALLATIONS_NAME = 'installations';
const INSTALLATIONS_NAME_INTERNAL = 'installations-internal';
const publicFactory = (container) => {
    const app = container.getProvider('app').getImmediate();
    // Throws if app isn't configured properly.
    const appConfig = extractAppConfig(app);
    const heartbeatServiceProvider = (0,_firebase_app__WEBPACK_IMPORTED_MODULE_0__._getProvider)(app, 'heartbeat');
    const installationsImpl = {
        app,
        appConfig,
        heartbeatServiceProvider,
        _delete: () => Promise.resolve()
    };
    return installationsImpl;
};
const internalFactory = (container) => {
    const app = container.getProvider('app').getImmediate();
    // Internal FIS instance relies on public FIS instance.
    const installations = (0,_firebase_app__WEBPACK_IMPORTED_MODULE_0__._getProvider)(app, INSTALLATIONS_NAME).getImmediate();
    const installationsInternal = {
        getId: () => getId(installations),
        getToken: (forceRefresh) => getToken(installations, forceRefresh)
    };
    return installationsInternal;
};
function registerInstallations() {
    (0,_firebase_app__WEBPACK_IMPORTED_MODULE_0__._registerComponent)(new _firebase_component__WEBPACK_IMPORTED_MODULE_1__.Component(INSTALLATIONS_NAME, publicFactory, "PUBLIC" /* PUBLIC */));
    (0,_firebase_app__WEBPACK_IMPORTED_MODULE_0__._registerComponent)(new _firebase_component__WEBPACK_IMPORTED_MODULE_1__.Component(INSTALLATIONS_NAME_INTERNAL, internalFactory, "PRIVATE" /* PRIVATE */));
}

/**
 * Firebase Installations
 *
 * @packageDocumentation
 */
registerInstallations();
(0,_firebase_app__WEBPACK_IMPORTED_MODULE_0__.registerVersion)(name, version);
// BUILD_TARGET will be replaced by values like esm5, esm2017, cjs5, etc during the compilation
(0,_firebase_app__WEBPACK_IMPORTED_MODULE_0__.registerVersion)(name, version, 'esm2017');


//# sourceMappingURL=index.esm2017.js.map


/***/ }),

/***/ "./node_modules/@firebase/logger/dist/esm/index.esm2017.js":
/*!*****************************************************************!*\
  !*** ./node_modules/@firebase/logger/dist/esm/index.esm2017.js ***!
  \*****************************************************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "LogLevel": () => (/* binding */ LogLevel),
/* harmony export */   "Logger": () => (/* binding */ Logger),
/* harmony export */   "setLogLevel": () => (/* binding */ setLogLevel),
/* harmony export */   "setUserLogHandler": () => (/* binding */ setUserLogHandler)
/* harmony export */ });
/**
 * @license
 * Copyright 2017 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
/**
 * A container for all of the Logger instances
 */
const instances = [];
/**
 * The JS SDK supports 5 log levels and also allows a user the ability to
 * silence the logs altogether.
 *
 * The order is a follows:
 * DEBUG < VERBOSE < INFO < WARN < ERROR
 *
 * All of the log types above the current log level will be captured (i.e. if
 * you set the log level to `INFO`, errors will still be logged, but `DEBUG` and
 * `VERBOSE` logs will not)
 */
var LogLevel;
(function (LogLevel) {
    LogLevel[LogLevel["DEBUG"] = 0] = "DEBUG";
    LogLevel[LogLevel["VERBOSE"] = 1] = "VERBOSE";
    LogLevel[LogLevel["INFO"] = 2] = "INFO";
    LogLevel[LogLevel["WARN"] = 3] = "WARN";
    LogLevel[LogLevel["ERROR"] = 4] = "ERROR";
    LogLevel[LogLevel["SILENT"] = 5] = "SILENT";
})(LogLevel || (LogLevel = {}));
const levelStringToEnum = {
    'debug': LogLevel.DEBUG,
    'verbose': LogLevel.VERBOSE,
    'info': LogLevel.INFO,
    'warn': LogLevel.WARN,
    'error': LogLevel.ERROR,
    'silent': LogLevel.SILENT
};
/**
 * The default log level
 */
const defaultLogLevel = LogLevel.INFO;
/**
 * By default, `console.debug` is not displayed in the developer console (in
 * chrome). To avoid forcing users to have to opt-in to these logs twice
 * (i.e. once for firebase, and once in the console), we are sending `DEBUG`
 * logs to the `console.log` function.
 */
const ConsoleMethod = {
    [LogLevel.DEBUG]: 'log',
    [LogLevel.VERBOSE]: 'log',
    [LogLevel.INFO]: 'info',
    [LogLevel.WARN]: 'warn',
    [LogLevel.ERROR]: 'error'
};
/**
 * The default log handler will forward DEBUG, VERBOSE, INFO, WARN, and ERROR
 * messages on to their corresponding console counterparts (if the log method
 * is supported by the current log level)
 */
const defaultLogHandler = (instance, logType, ...args) => {
    if (logType < instance.logLevel) {
        return;
    }
    const now = new Date().toISOString();
    const method = ConsoleMethod[logType];
    if (method) {
        console[method](`[${now}]  ${instance.name}:`, ...args);
    }
    else {
        throw new Error(`Attempted to log a message with an invalid logType (value: ${logType})`);
    }
};
class Logger {
    /**
     * Gives you an instance of a Logger to capture messages according to
     * Firebase's logging scheme.
     *
     * @param name The name that the logs will be associated with
     */
    constructor(name) {
        this.name = name;
        /**
         * The log level of the given Logger instance.
         */
        this._logLevel = defaultLogLevel;
        /**
         * The main (internal) log handler for the Logger instance.
         * Can be set to a new function in internal package code but not by user.
         */
        this._logHandler = defaultLogHandler;
        /**
         * The optional, additional, user-defined log handler for the Logger instance.
         */
        this._userLogHandler = null;
        /**
         * Capture the current instance for later use
         */
        instances.push(this);
    }
    get logLevel() {
        return this._logLevel;
    }
    set logLevel(val) {
        if (!(val in LogLevel)) {
            throw new TypeError(`Invalid value "${val}" assigned to \`logLevel\``);
        }
        this._logLevel = val;
    }
    // Workaround for setter/getter having to be the same type.
    setLogLevel(val) {
        this._logLevel = typeof val === 'string' ? levelStringToEnum[val] : val;
    }
    get logHandler() {
        return this._logHandler;
    }
    set logHandler(val) {
        if (typeof val !== 'function') {
            throw new TypeError('Value assigned to `logHandler` must be a function');
        }
        this._logHandler = val;
    }
    get userLogHandler() {
        return this._userLogHandler;
    }
    set userLogHandler(val) {
        this._userLogHandler = val;
    }
    /**
     * The functions below are all based on the `console` interface
     */
    debug(...args) {
        this._userLogHandler && this._userLogHandler(this, LogLevel.DEBUG, ...args);
        this._logHandler(this, LogLevel.DEBUG, ...args);
    }
    log(...args) {
        this._userLogHandler &&
            this._userLogHandler(this, LogLevel.VERBOSE, ...args);
        this._logHandler(this, LogLevel.VERBOSE, ...args);
    }
    info(...args) {
        this._userLogHandler && this._userLogHandler(this, LogLevel.INFO, ...args);
        this._logHandler(this, LogLevel.INFO, ...args);
    }
    warn(...args) {
        this._userLogHandler && this._userLogHandler(this, LogLevel.WARN, ...args);
        this._logHandler(this, LogLevel.WARN, ...args);
    }
    error(...args) {
        this._userLogHandler && this._userLogHandler(this, LogLevel.ERROR, ...args);
        this._logHandler(this, LogLevel.ERROR, ...args);
    }
}
function setLogLevel(level) {
    instances.forEach(inst => {
        inst.setLogLevel(level);
    });
}
function setUserLogHandler(logCallback, options) {
    for (const instance of instances) {
        let customLogLevel = null;
        if (options && options.level) {
            customLogLevel = levelStringToEnum[options.level];
        }
        if (logCallback === null) {
            instance.userLogHandler = null;
        }
        else {
            instance.userLogHandler = (instance, level, ...args) => {
                const message = args
                    .map(arg => {
                    if (arg == null) {
                        return null;
                    }
                    else if (typeof arg === 'string') {
                        return arg;
                    }
                    else if (typeof arg === 'number' || typeof arg === 'boolean') {
                        return arg.toString();
                    }
                    else if (arg instanceof Error) {
                        return arg.message;
                    }
                    else {
                        try {
                            return JSON.stringify(arg);
                        }
                        catch (ignored) {
                            return null;
                        }
                    }
                })
                    .filter(arg => arg)
                    .join(' ');
                if (level >= (customLogLevel !== null && customLogLevel !== void 0 ? customLogLevel : instance.logLevel)) {
                    logCallback({
                        level: LogLevel[level].toLowerCase(),
                        message,
                        args,
                        type: instance.name
                    });
                }
            };
        }
    }
}


//# sourceMappingURL=index.esm2017.js.map


/***/ }),

/***/ "./node_modules/@firebase/messaging/dist/esm/index.esm2017.js":
/*!********************************************************************!*\
  !*** ./node_modules/@firebase/messaging/dist/esm/index.esm2017.js ***!
  \********************************************************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "deleteToken": () => (/* binding */ deleteToken),
/* harmony export */   "getMessaging": () => (/* binding */ getMessagingInWindow),
/* harmony export */   "getToken": () => (/* binding */ getToken),
/* harmony export */   "isSupported": () => (/* binding */ isWindowSupported),
/* harmony export */   "onMessage": () => (/* binding */ onMessage)
/* harmony export */ });
/* harmony import */ var _firebase_installations__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @firebase/installations */ "./node_modules/@firebase/installations/dist/esm/index.esm2017.js");
/* harmony import */ var _firebase_component__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @firebase/component */ "./node_modules/@firebase/component/dist/esm/index.esm2017.js");
/* harmony import */ var _firebase_util__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @firebase/util */ "./node_modules/@firebase/util/dist/index.esm2017.js");
/* harmony import */ var _firebase_app__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @firebase/app */ "./node_modules/@firebase/app/dist/esm/index.esm2017.js");





/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
const DEFAULT_SW_PATH = '/firebase-messaging-sw.js';
const DEFAULT_SW_SCOPE = '/firebase-cloud-messaging-push-scope';
const DEFAULT_VAPID_KEY = 'BDOU99-h67HcA6JeFXHbSNMu7e2yNNu3RzoMj8TM4W88jITfq7ZmPvIM1Iv-4_l2LxQcYwhqby2xGpWwzjfAnG4';
const ENDPOINT = 'https://fcmregistrations.googleapis.com/v1';
const CONSOLE_CAMPAIGN_ID = 'google.c.a.c_id';
const CONSOLE_CAMPAIGN_NAME = 'google.c.a.c_l';
const CONSOLE_CAMPAIGN_TIME = 'google.c.a.ts';
/** Set to '1' if Analytics is enabled for the campaign */
const CONSOLE_CAMPAIGN_ANALYTICS_ENABLED = 'google.c.a.e';
var MessageType$1;
(function (MessageType) {
    MessageType[MessageType["DATA_MESSAGE"] = 1] = "DATA_MESSAGE";
    MessageType[MessageType["DISPLAY_NOTIFICATION"] = 3] = "DISPLAY_NOTIFICATION";
})(MessageType$1 || (MessageType$1 = {}));

/**
 * @license
 * Copyright 2018 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except
 * in compliance with the License. You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software distributed under the License
 * is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express
 * or implied. See the License for the specific language governing permissions and limitations under
 * the License.
 */
var MessageType;
(function (MessageType) {
    MessageType["PUSH_RECEIVED"] = "push-received";
    MessageType["NOTIFICATION_CLICKED"] = "notification-clicked";
})(MessageType || (MessageType = {}));

/**
 * @license
 * Copyright 2017 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
function arrayToBase64(array) {
    const uint8Array = new Uint8Array(array);
    const base64String = btoa(String.fromCharCode(...uint8Array));
    return base64String.replace(/=/g, '').replace(/\+/g, '-').replace(/\//g, '_');
}
function base64ToArray(base64String) {
    const padding = '='.repeat((4 - (base64String.length % 4)) % 4);
    const base64 = (base64String + padding)
        .replace(/\-/g, '+')
        .replace(/_/g, '/');
    const rawData = atob(base64);
    const outputArray = new Uint8Array(rawData.length);
    for (let i = 0; i < rawData.length; ++i) {
        outputArray[i] = rawData.charCodeAt(i);
    }
    return outputArray;
}

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
const OLD_DB_NAME = 'fcm_token_details_db';
/**
 * The last DB version of 'fcm_token_details_db' was 4. This is one higher, so that the upgrade
 * callback is called for all versions of the old DB.
 */
const OLD_DB_VERSION = 5;
const OLD_OBJECT_STORE_NAME = 'fcm_token_object_Store';
async function migrateOldDatabase(senderId) {
    if ('databases' in indexedDB) {
        // indexedDb.databases() is an IndexedDB v3 API and does not exist in all browsers. TODO: Remove
        // typecast when it lands in TS types.
        const databases = await indexedDB.databases();
        const dbNames = databases.map(db => db.name);
        if (!dbNames.includes(OLD_DB_NAME)) {
            // old DB didn't exist, no need to open.
            return null;
        }
    }
    let tokenDetails = null;
    const db = await (0,_firebase_util__WEBPACK_IMPORTED_MODULE_2__.openDB)(OLD_DB_NAME, OLD_DB_VERSION, async (db, oldVersion, newVersion, upgradeTransaction) => {
        var _a;
        if (oldVersion < 2) {
            // Database too old, skip migration.
            return;
        }
        if (!db.objectStoreNames.contains(OLD_OBJECT_STORE_NAME)) {
            // Database did not exist. Nothing to do.
            return;
        }
        const objectStore = upgradeTransaction.objectStore(OLD_OBJECT_STORE_NAME);
        const value = await objectStore.index('fcmSenderId').get(senderId);
        await objectStore.clear();
        if (!value) {
            // No entry in the database, nothing to migrate.
            return;
        }
        if (oldVersion === 2) {
            const oldDetails = value;
            if (!oldDetails.auth || !oldDetails.p256dh || !oldDetails.endpoint) {
                return;
            }
            tokenDetails = {
                token: oldDetails.fcmToken,
                createTime: (_a = oldDetails.createTime) !== null && _a !== void 0 ? _a : Date.now(),
                subscriptionOptions: {
                    auth: oldDetails.auth,
                    p256dh: oldDetails.p256dh,
                    endpoint: oldDetails.endpoint,
                    swScope: oldDetails.swScope,
                    vapidKey: typeof oldDetails.vapidKey === 'string'
                        ? oldDetails.vapidKey
                        : arrayToBase64(oldDetails.vapidKey)
                }
            };
        }
        else if (oldVersion === 3) {
            const oldDetails = value;
            tokenDetails = {
                token: oldDetails.fcmToken,
                createTime: oldDetails.createTime,
                subscriptionOptions: {
                    auth: arrayToBase64(oldDetails.auth),
                    p256dh: arrayToBase64(oldDetails.p256dh),
                    endpoint: oldDetails.endpoint,
                    swScope: oldDetails.swScope,
                    vapidKey: arrayToBase64(oldDetails.vapidKey)
                }
            };
        }
        else if (oldVersion === 4) {
            const oldDetails = value;
            tokenDetails = {
                token: oldDetails.fcmToken,
                createTime: oldDetails.createTime,
                subscriptionOptions: {
                    auth: arrayToBase64(oldDetails.auth),
                    p256dh: arrayToBase64(oldDetails.p256dh),
                    endpoint: oldDetails.endpoint,
                    swScope: oldDetails.swScope,
                    vapidKey: arrayToBase64(oldDetails.vapidKey)
                }
            };
        }
    });
    db.close();
    // Delete all old databases.
    await (0,_firebase_util__WEBPACK_IMPORTED_MODULE_2__.deleteDB)(OLD_DB_NAME);
    await (0,_firebase_util__WEBPACK_IMPORTED_MODULE_2__.deleteDB)('fcm_vapid_details_db');
    await (0,_firebase_util__WEBPACK_IMPORTED_MODULE_2__.deleteDB)('undefined');
    return checkTokenDetails(tokenDetails) ? tokenDetails : null;
}
function checkTokenDetails(tokenDetails) {
    if (!tokenDetails || !tokenDetails.subscriptionOptions) {
        return false;
    }
    const { subscriptionOptions } = tokenDetails;
    return (typeof tokenDetails.createTime === 'number' &&
        tokenDetails.createTime > 0 &&
        typeof tokenDetails.token === 'string' &&
        tokenDetails.token.length > 0 &&
        typeof subscriptionOptions.auth === 'string' &&
        subscriptionOptions.auth.length > 0 &&
        typeof subscriptionOptions.p256dh === 'string' &&
        subscriptionOptions.p256dh.length > 0 &&
        typeof subscriptionOptions.endpoint === 'string' &&
        subscriptionOptions.endpoint.length > 0 &&
        typeof subscriptionOptions.swScope === 'string' &&
        subscriptionOptions.swScope.length > 0 &&
        typeof subscriptionOptions.vapidKey === 'string' &&
        subscriptionOptions.vapidKey.length > 0);
}

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
// Exported for tests.
const DATABASE_NAME = 'firebase-messaging-database';
const DATABASE_VERSION = 1;
const OBJECT_STORE_NAME = 'firebase-messaging-store';
let dbPromise = null;
function getDbPromise() {
    if (!dbPromise) {
        dbPromise = (0,_firebase_util__WEBPACK_IMPORTED_MODULE_2__.openDB)(DATABASE_NAME, DATABASE_VERSION, (upgradeDb, oldVersion) => {
            // We don't use 'break' in this switch statement, the fall-through behavior is what we want,
            // because if there are multiple versions between the old version and the current version, we
            // want ALL the migrations that correspond to those versions to run, not only the last one.
            // eslint-disable-next-line default-case
            switch (oldVersion) {
                case 0:
                    upgradeDb.createObjectStore(OBJECT_STORE_NAME);
            }
        });
    }
    return dbPromise;
}
/** Gets record(s) from the objectStore that match the given key. */
async function dbGet(firebaseDependencies) {
    const key = getKey(firebaseDependencies);
    const db = await getDbPromise();
    const tokenDetails = (await db
        .transaction(OBJECT_STORE_NAME)
        .objectStore(OBJECT_STORE_NAME)
        .get(key));
    if (tokenDetails) {
        return tokenDetails;
    }
    else {
        // Check if there is a tokenDetails object in the old DB.
        const oldTokenDetails = await migrateOldDatabase(firebaseDependencies.appConfig.senderId);
        if (oldTokenDetails) {
            await dbSet(firebaseDependencies, oldTokenDetails);
            return oldTokenDetails;
        }
    }
}
/** Assigns or overwrites the record for the given key with the given value. */
async function dbSet(firebaseDependencies, tokenDetails) {
    const key = getKey(firebaseDependencies);
    const db = await getDbPromise();
    const tx = db.transaction(OBJECT_STORE_NAME, 'readwrite');
    await tx.objectStore(OBJECT_STORE_NAME).put(tokenDetails, key);
    await tx.complete;
    return tokenDetails;
}
/** Removes record(s) from the objectStore that match the given key. */
async function dbRemove(firebaseDependencies) {
    const key = getKey(firebaseDependencies);
    const db = await getDbPromise();
    const tx = db.transaction(OBJECT_STORE_NAME, 'readwrite');
    await tx.objectStore(OBJECT_STORE_NAME).delete(key);
    await tx.complete;
}
function getKey({ appConfig }) {
    return appConfig.appId;
}

/**
 * @license
 * Copyright 2017 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
const ERROR_MAP = {
    ["missing-app-config-values" /* MISSING_APP_CONFIG_VALUES */]: 'Missing App configuration value: "{$valueName}"',
    ["only-available-in-window" /* AVAILABLE_IN_WINDOW */]: 'This method is available in a Window context.',
    ["only-available-in-sw" /* AVAILABLE_IN_SW */]: 'This method is available in a service worker context.',
    ["permission-default" /* PERMISSION_DEFAULT */]: 'The notification permission was not granted and dismissed instead.',
    ["permission-blocked" /* PERMISSION_BLOCKED */]: 'The notification permission was not granted and blocked instead.',
    ["unsupported-browser" /* UNSUPPORTED_BROWSER */]: "This browser doesn't support the API's required to use the Firebase SDK.",
    ["indexed-db-unsupported" /* INDEXED_DB_UNSUPPORTED */]: "This browser doesn't support indexedDb.open() (ex. Safari iFrame, Firefox Private Browsing, etc)",
    ["failed-service-worker-registration" /* FAILED_DEFAULT_REGISTRATION */]: 'We are unable to register the default service worker. {$browserErrorMessage}',
    ["token-subscribe-failed" /* TOKEN_SUBSCRIBE_FAILED */]: 'A problem occurred while subscribing the user to FCM: {$errorInfo}',
    ["token-subscribe-no-token" /* TOKEN_SUBSCRIBE_NO_TOKEN */]: 'FCM returned no token when subscribing the user to push.',
    ["token-unsubscribe-failed" /* TOKEN_UNSUBSCRIBE_FAILED */]: 'A problem occurred while unsubscribing the ' +
        'user from FCM: {$errorInfo}',
    ["token-update-failed" /* TOKEN_UPDATE_FAILED */]: 'A problem occurred while updating the user from FCM: {$errorInfo}',
    ["token-update-no-token" /* TOKEN_UPDATE_NO_TOKEN */]: 'FCM returned no token when updating the user to push.',
    ["use-sw-after-get-token" /* USE_SW_AFTER_GET_TOKEN */]: 'The useServiceWorker() method may only be called once and must be ' +
        'called before calling getToken() to ensure your service worker is used.',
    ["invalid-sw-registration" /* INVALID_SW_REGISTRATION */]: 'The input to useServiceWorker() must be a ServiceWorkerRegistration.',
    ["invalid-bg-handler" /* INVALID_BG_HANDLER */]: 'The input to setBackgroundMessageHandler() must be a function.',
    ["invalid-vapid-key" /* INVALID_VAPID_KEY */]: 'The public VAPID key must be a string.',
    ["use-vapid-key-after-get-token" /* USE_VAPID_KEY_AFTER_GET_TOKEN */]: 'The usePublicVapidKey() method may only be called once and must be ' +
        'called before calling getToken() to ensure your VAPID key is used.'
};
const ERROR_FACTORY = new _firebase_util__WEBPACK_IMPORTED_MODULE_2__.ErrorFactory('messaging', 'Messaging', ERROR_MAP);

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
async function requestGetToken(firebaseDependencies, subscriptionOptions) {
    const headers = await getHeaders(firebaseDependencies);
    const body = getBody(subscriptionOptions);
    const subscribeOptions = {
        method: 'POST',
        headers,
        body: JSON.stringify(body)
    };
    let responseData;
    try {
        const response = await fetch(getEndpoint(firebaseDependencies.appConfig), subscribeOptions);
        responseData = await response.json();
    }
    catch (err) {
        throw ERROR_FACTORY.create("token-subscribe-failed" /* TOKEN_SUBSCRIBE_FAILED */, {
            errorInfo: err
        });
    }
    if (responseData.error) {
        const message = responseData.error.message;
        throw ERROR_FACTORY.create("token-subscribe-failed" /* TOKEN_SUBSCRIBE_FAILED */, {
            errorInfo: message
        });
    }
    if (!responseData.token) {
        throw ERROR_FACTORY.create("token-subscribe-no-token" /* TOKEN_SUBSCRIBE_NO_TOKEN */);
    }
    return responseData.token;
}
async function requestUpdateToken(firebaseDependencies, tokenDetails) {
    const headers = await getHeaders(firebaseDependencies);
    const body = getBody(tokenDetails.subscriptionOptions);
    const updateOptions = {
        method: 'PATCH',
        headers,
        body: JSON.stringify(body)
    };
    let responseData;
    try {
        const response = await fetch(`${getEndpoint(firebaseDependencies.appConfig)}/${tokenDetails.token}`, updateOptions);
        responseData = await response.json();
    }
    catch (err) {
        throw ERROR_FACTORY.create("token-update-failed" /* TOKEN_UPDATE_FAILED */, {
            errorInfo: err
        });
    }
    if (responseData.error) {
        const message = responseData.error.message;
        throw ERROR_FACTORY.create("token-update-failed" /* TOKEN_UPDATE_FAILED */, {
            errorInfo: message
        });
    }
    if (!responseData.token) {
        throw ERROR_FACTORY.create("token-update-no-token" /* TOKEN_UPDATE_NO_TOKEN */);
    }
    return responseData.token;
}
async function requestDeleteToken(firebaseDependencies, token) {
    const headers = await getHeaders(firebaseDependencies);
    const unsubscribeOptions = {
        method: 'DELETE',
        headers
    };
    try {
        const response = await fetch(`${getEndpoint(firebaseDependencies.appConfig)}/${token}`, unsubscribeOptions);
        const responseData = await response.json();
        if (responseData.error) {
            const message = responseData.error.message;
            throw ERROR_FACTORY.create("token-unsubscribe-failed" /* TOKEN_UNSUBSCRIBE_FAILED */, {
                errorInfo: message
            });
        }
    }
    catch (err) {
        throw ERROR_FACTORY.create("token-unsubscribe-failed" /* TOKEN_UNSUBSCRIBE_FAILED */, {
            errorInfo: err
        });
    }
}
function getEndpoint({ projectId }) {
    return `${ENDPOINT}/projects/${projectId}/registrations`;
}
async function getHeaders({ appConfig, installations }) {
    const authToken = await installations.getToken();
    return new Headers({
        'Content-Type': 'application/json',
        Accept: 'application/json',
        'x-goog-api-key': appConfig.apiKey,
        'x-goog-firebase-installations-auth': `FIS ${authToken}`
    });
}
function getBody({ p256dh, auth, endpoint, vapidKey }) {
    const body = {
        web: {
            endpoint,
            auth,
            p256dh
        }
    };
    if (vapidKey !== DEFAULT_VAPID_KEY) {
        body.web.applicationPubKey = vapidKey;
    }
    return body;
}

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
// UpdateRegistration will be called once every week.
const TOKEN_EXPIRATION_MS = 7 * 24 * 60 * 60 * 1000; // 7 days
async function getTokenInternal(messaging) {
    const pushSubscription = await getPushSubscription(messaging.swRegistration, messaging.vapidKey);
    const subscriptionOptions = {
        vapidKey: messaging.vapidKey,
        swScope: messaging.swRegistration.scope,
        endpoint: pushSubscription.endpoint,
        auth: arrayToBase64(pushSubscription.getKey('auth')),
        p256dh: arrayToBase64(pushSubscription.getKey('p256dh'))
    };
    const tokenDetails = await dbGet(messaging.firebaseDependencies);
    if (!tokenDetails) {
        // No token, get a new one.
        return getNewToken(messaging.firebaseDependencies, subscriptionOptions);
    }
    else if (!isTokenValid(tokenDetails.subscriptionOptions, subscriptionOptions)) {
        // Invalid token, get a new one.
        try {
            await requestDeleteToken(messaging.firebaseDependencies, tokenDetails.token);
        }
        catch (e) {
            // Suppress errors because of #2364
            console.warn(e);
        }
        return getNewToken(messaging.firebaseDependencies, subscriptionOptions);
    }
    else if (Date.now() >= tokenDetails.createTime + TOKEN_EXPIRATION_MS) {
        // Weekly token refresh
        return updateToken(messaging, {
            token: tokenDetails.token,
            createTime: Date.now(),
            subscriptionOptions
        });
    }
    else {
        // Valid token, nothing to do.
        return tokenDetails.token;
    }
}
/**
 * This method deletes the token from the database, unsubscribes the token from FCM, and unregisters
 * the push subscription if it exists.
 */
async function deleteTokenInternal(messaging) {
    const tokenDetails = await dbGet(messaging.firebaseDependencies);
    if (tokenDetails) {
        await requestDeleteToken(messaging.firebaseDependencies, tokenDetails.token);
        await dbRemove(messaging.firebaseDependencies);
    }
    // Unsubscribe from the push subscription.
    const pushSubscription = await messaging.swRegistration.pushManager.getSubscription();
    if (pushSubscription) {
        return pushSubscription.unsubscribe();
    }
    // If there's no SW, consider it a success.
    return true;
}
async function updateToken(messaging, tokenDetails) {
    try {
        const updatedToken = await requestUpdateToken(messaging.firebaseDependencies, tokenDetails);
        const updatedTokenDetails = Object.assign(Object.assign({}, tokenDetails), { token: updatedToken, createTime: Date.now() });
        await dbSet(messaging.firebaseDependencies, updatedTokenDetails);
        return updatedToken;
    }
    catch (e) {
        await deleteTokenInternal(messaging);
        throw e;
    }
}
async function getNewToken(firebaseDependencies, subscriptionOptions) {
    const token = await requestGetToken(firebaseDependencies, subscriptionOptions);
    const tokenDetails = {
        token,
        createTime: Date.now(),
        subscriptionOptions
    };
    await dbSet(firebaseDependencies, tokenDetails);
    return tokenDetails.token;
}
/**
 * Gets a PushSubscription for the current user.
 */
async function getPushSubscription(swRegistration, vapidKey) {
    const subscription = await swRegistration.pushManager.getSubscription();
    if (subscription) {
        return subscription;
    }
    return swRegistration.pushManager.subscribe({
        userVisibleOnly: true,
        // Chrome <= 75 doesn't support base64-encoded VAPID key. For backward compatibility, VAPID key
        // submitted to pushManager#subscribe must be of type Uint8Array.
        applicationServerKey: base64ToArray(vapidKey)
    });
}
/**
 * Checks if the saved tokenDetails object matches the configuration provided.
 */
function isTokenValid(dbOptions, currentOptions) {
    const isVapidKeyEqual = currentOptions.vapidKey === dbOptions.vapidKey;
    const isEndpointEqual = currentOptions.endpoint === dbOptions.endpoint;
    const isAuthEqual = currentOptions.auth === dbOptions.auth;
    const isP256dhEqual = currentOptions.p256dh === dbOptions.p256dh;
    return isVapidKeyEqual && isEndpointEqual && isAuthEqual && isP256dhEqual;
}

/**
 * @license
 * Copyright 2020 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
function externalizePayload(internalPayload) {
    const payload = {
        from: internalPayload.from,
        // eslint-disable-next-line camelcase
        collapseKey: internalPayload.collapse_key,
        // eslint-disable-next-line camelcase
        messageId: internalPayload.fcmMessageId
    };
    propagateNotificationPayload(payload, internalPayload);
    propagateDataPayload(payload, internalPayload);
    propagateFcmOptions(payload, internalPayload);
    return payload;
}
function propagateNotificationPayload(payload, messagePayloadInternal) {
    if (!messagePayloadInternal.notification) {
        return;
    }
    payload.notification = {};
    const title = messagePayloadInternal.notification.title;
    if (!!title) {
        payload.notification.title = title;
    }
    const body = messagePayloadInternal.notification.body;
    if (!!body) {
        payload.notification.body = body;
    }
    const image = messagePayloadInternal.notification.image;
    if (!!image) {
        payload.notification.image = image;
    }
}
function propagateDataPayload(payload, messagePayloadInternal) {
    if (!messagePayloadInternal.data) {
        return;
    }
    payload.data = messagePayloadInternal.data;
}
function propagateFcmOptions(payload, messagePayloadInternal) {
    if (!messagePayloadInternal.fcmOptions) {
        return;
    }
    payload.fcmOptions = {};
    const link = messagePayloadInternal.fcmOptions.link;
    if (!!link) {
        payload.fcmOptions.link = link;
    }
    // eslint-disable-next-line camelcase
    const analyticsLabel = messagePayloadInternal.fcmOptions.analytics_label;
    if (!!analyticsLabel) {
        payload.fcmOptions.analyticsLabel = analyticsLabel;
    }
}

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
function isConsoleMessage(data) {
    // This message has a campaign ID, meaning it was sent using the Firebase Console.
    return typeof data === 'object' && !!data && CONSOLE_CAMPAIGN_ID in data;
}

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
_mergeStrings('hts/frbslgigp.ogepscmv/ieo/eaylg', 'tp:/ieaeogn-agolai.o/1frlglgc/o');
_mergeStrings('AzSCbw63g1R0nCw85jG8', 'Iaya3yLKwmgvh7cF0q4');
function _mergeStrings(s1, s2) {
    const resultArray = [];
    for (let i = 0; i < s1.length; i++) {
        resultArray.push(s1.charAt(i));
        if (i < s2.length) {
            resultArray.push(s2.charAt(i));
        }
    }
    return resultArray.join('');
}

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
function extractAppConfig(app) {
    if (!app || !app.options) {
        throw getMissingValueError('App Configuration Object');
    }
    if (!app.name) {
        throw getMissingValueError('App Name');
    }
    // Required app config keys
    const configKeys = [
        'projectId',
        'apiKey',
        'appId',
        'messagingSenderId'
    ];
    const { options } = app;
    for (const keyName of configKeys) {
        if (!options[keyName]) {
            throw getMissingValueError(keyName);
        }
    }
    return {
        appName: app.name,
        projectId: options.projectId,
        apiKey: options.apiKey,
        appId: options.appId,
        senderId: options.messagingSenderId
    };
}
function getMissingValueError(valueName) {
    return ERROR_FACTORY.create("missing-app-config-values" /* MISSING_APP_CONFIG_VALUES */, {
        valueName
    });
}

/**
 * @license
 * Copyright 2020 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
class MessagingService {
    constructor(app, installations, analyticsProvider) {
        // logging is only done with end user consent. Default to false.
        this.deliveryMetricsExportedToBigQueryEnabled = false;
        this.onBackgroundMessageHandler = null;
        this.onMessageHandler = null;
        this.logEvents = [];
        this.isLogServiceStarted = false;
        const appConfig = extractAppConfig(app);
        this.firebaseDependencies = {
            app,
            appConfig,
            installations,
            analyticsProvider
        };
    }
    _delete() {
        return Promise.resolve();
    }
}

/**
 * @license
 * Copyright 2020 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
async function registerDefaultSw(messaging) {
    try {
        messaging.swRegistration = await navigator.serviceWorker.register(DEFAULT_SW_PATH, {
            scope: DEFAULT_SW_SCOPE
        });
        // The timing when browser updates sw when sw has an update is unreliable from experiment. It
        // leads to version conflict when the SDK upgrades to a newer version in the main page, but sw
        // is stuck with the old version. For example,
        // https://github.com/firebase/firebase-js-sdk/issues/2590 The following line reliably updates
        // sw if there was an update.
        messaging.swRegistration.update().catch(() => {
            /* it is non blocking and we don't care if it failed */
        });
    }
    catch (e) {
        throw ERROR_FACTORY.create("failed-service-worker-registration" /* FAILED_DEFAULT_REGISTRATION */, {
            browserErrorMessage: e.message
        });
    }
}

/**
 * @license
 * Copyright 2020 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
async function updateSwReg(messaging, swRegistration) {
    if (!swRegistration && !messaging.swRegistration) {
        await registerDefaultSw(messaging);
    }
    if (!swRegistration && !!messaging.swRegistration) {
        return;
    }
    if (!(swRegistration instanceof ServiceWorkerRegistration)) {
        throw ERROR_FACTORY.create("invalid-sw-registration" /* INVALID_SW_REGISTRATION */);
    }
    messaging.swRegistration = swRegistration;
}

/**
 * @license
 * Copyright 2020 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
async function updateVapidKey(messaging, vapidKey) {
    if (!!vapidKey) {
        messaging.vapidKey = vapidKey;
    }
    else if (!messaging.vapidKey) {
        messaging.vapidKey = DEFAULT_VAPID_KEY;
    }
}

/**
 * @license
 * Copyright 2020 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
async function getToken$1(messaging, options) {
    if (!navigator) {
        throw ERROR_FACTORY.create("only-available-in-window" /* AVAILABLE_IN_WINDOW */);
    }
    if (Notification.permission === 'default') {
        await Notification.requestPermission();
    }
    if (Notification.permission !== 'granted') {
        throw ERROR_FACTORY.create("permission-blocked" /* PERMISSION_BLOCKED */);
    }
    await updateVapidKey(messaging, options === null || options === void 0 ? void 0 : options.vapidKey);
    await updateSwReg(messaging, options === null || options === void 0 ? void 0 : options.serviceWorkerRegistration);
    return getTokenInternal(messaging);
}

/**
 * @license
 * Copyright 2019 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
async function logToScion(messaging, messageType, data) {
    const eventType = getEventType(messageType);
    const analytics = await messaging.firebaseDependencies.analyticsProvider.get();
    analytics.logEvent(eventType, {
        /* eslint-disable camelcase */
        message_id: data[CONSOLE_CAMPAIGN_ID],
        message_name: data[CONSOLE_CAMPAIGN_NAME],
        message_time: data[CONSOLE_CAMPAIGN_TIME],
        message_device_time: Math.floor(Date.now() / 1000)
        /* eslint-enable camelcase */
    });
}
function getEventType(messageType) {
    switch (messageType) {
        case MessageType.NOTIFICATION_CLICKED:
            return 'notification_open';
        case MessageType.PUSH_RECEIVED:
            return 'notification_foreground';
        default:
            throw new Error();
    }
}

/**
 * @license
 * Copyright 2017 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
async function messageEventListener(messaging, event) {
    const internalPayload = event.data;
    if (!internalPayload.isFirebaseMessaging) {
        return;
    }
    if (messaging.onMessageHandler &&
        internalPayload.messageType === MessageType.PUSH_RECEIVED) {
        if (typeof messaging.onMessageHandler === 'function') {
            messaging.onMessageHandler(externalizePayload(internalPayload));
        }
        else {
            messaging.onMessageHandler.next(externalizePayload(internalPayload));
        }
    }
    // Log to Scion if applicable
    const dataPayload = internalPayload.data;
    if (isConsoleMessage(dataPayload) &&
        dataPayload[CONSOLE_CAMPAIGN_ANALYTICS_ENABLED] === '1') {
        await logToScion(messaging, internalPayload.messageType, dataPayload);
    }
}

const name = "@firebase/messaging";
const version = "0.9.12";

/**
 * @license
 * Copyright 2020 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
const WindowMessagingFactory = (container) => {
    const messaging = new MessagingService(container.getProvider('app').getImmediate(), container.getProvider('installations-internal').getImmediate(), container.getProvider('analytics-internal'));
    navigator.serviceWorker.addEventListener('message', e => messageEventListener(messaging, e));
    return messaging;
};
const WindowMessagingInternalFactory = (container) => {
    const messaging = container
        .getProvider('messaging')
        .getImmediate();
    const messagingInternal = {
        getToken: (options) => getToken$1(messaging, options)
    };
    return messagingInternal;
};
function registerMessagingInWindow() {
    (0,_firebase_app__WEBPACK_IMPORTED_MODULE_3__._registerComponent)(new _firebase_component__WEBPACK_IMPORTED_MODULE_1__.Component('messaging', WindowMessagingFactory, "PUBLIC" /* PUBLIC */));
    (0,_firebase_app__WEBPACK_IMPORTED_MODULE_3__._registerComponent)(new _firebase_component__WEBPACK_IMPORTED_MODULE_1__.Component('messaging-internal', WindowMessagingInternalFactory, "PRIVATE" /* PRIVATE */));
    (0,_firebase_app__WEBPACK_IMPORTED_MODULE_3__.registerVersion)(name, version);
    // BUILD_TARGET will be replaced by values like esm5, esm2017, cjs5, etc during the compilation
    (0,_firebase_app__WEBPACK_IMPORTED_MODULE_3__.registerVersion)(name, version, 'esm2017');
}

/**
 * @license
 * Copyright 2020 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
/**
 * Checks if all required APIs exist in the browser.
 * @returns a Promise that resolves to a boolean.
 *
 * @public
 */
async function isWindowSupported() {
    try {
        // This throws if open() is unsupported, so adding it to the conditional
        // statement below can cause an uncaught error.
        await (0,_firebase_util__WEBPACK_IMPORTED_MODULE_2__.validateIndexedDBOpenable)();
    }
    catch (e) {
        return false;
    }
    // firebase-js-sdk/issues/2393 reveals that idb#open in Safari iframe and Firefox private browsing
    // might be prohibited to run. In these contexts, an error would be thrown during the messaging
    // instantiating phase, informing the developers to import/call isSupported for special handling.
    return (typeof window !== 'undefined' &&
        (0,_firebase_util__WEBPACK_IMPORTED_MODULE_2__.isIndexedDBAvailable)() &&
        (0,_firebase_util__WEBPACK_IMPORTED_MODULE_2__.areCookiesEnabled)() &&
        'serviceWorker' in navigator &&
        'PushManager' in window &&
        'Notification' in window &&
        'fetch' in window &&
        ServiceWorkerRegistration.prototype.hasOwnProperty('showNotification') &&
        PushSubscription.prototype.hasOwnProperty('getKey'));
}

/**
 * @license
 * Copyright 2020 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
async function deleteToken$1(messaging) {
    if (!navigator) {
        throw ERROR_FACTORY.create("only-available-in-window" /* AVAILABLE_IN_WINDOW */);
    }
    if (!messaging.swRegistration) {
        await registerDefaultSw(messaging);
    }
    return deleteTokenInternal(messaging);
}

/**
 * @license
 * Copyright 2020 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
function onMessage$1(messaging, nextOrObserver) {
    if (!navigator) {
        throw ERROR_FACTORY.create("only-available-in-window" /* AVAILABLE_IN_WINDOW */);
    }
    messaging.onMessageHandler = nextOrObserver;
    return () => {
        messaging.onMessageHandler = null;
    };
}

/**
 * @license
 * Copyright 2017 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
/**
 * Retrieves a Firebase Cloud Messaging instance.
 *
 * @returns The Firebase Cloud Messaging instance associated with the provided firebase app.
 *
 * @public
 */
function getMessagingInWindow(app = (0,_firebase_app__WEBPACK_IMPORTED_MODULE_3__.getApp)()) {
    // Conscious decision to make this async check non-blocking during the messaging instance
    // initialization phase for performance consideration. An error would be thrown latter for
    // developer's information. Developers can then choose to import and call `isSupported` for
    // special handling.
    isWindowSupported().then(isSupported => {
        // If `isWindowSupported()` resolved, but returned false.
        if (!isSupported) {
            throw ERROR_FACTORY.create("unsupported-browser" /* UNSUPPORTED_BROWSER */);
        }
    }, _ => {
        // If `isWindowSupported()` rejected.
        throw ERROR_FACTORY.create("indexed-db-unsupported" /* INDEXED_DB_UNSUPPORTED */);
    });
    return (0,_firebase_app__WEBPACK_IMPORTED_MODULE_3__._getProvider)((0,_firebase_util__WEBPACK_IMPORTED_MODULE_2__.getModularInstance)(app), 'messaging').getImmediate();
}
/**
 * Subscribes the {@link Messaging} instance to push notifications. Returns an Firebase Cloud
 * Messaging registration token that can be used to send push messages to that {@link Messaging}
 * instance.
 *
 * If a notification permission isn't already granted, this method asks the user for permission. The
 * returned promise rejects if the user does not allow the app to show notifications.
 *
 * @param messaging - The {@link Messaging} instance.
 * @param options - Provides an optional vapid key and an optinoal service worker registration
 *
 * @returns The promise resolves with an FCM registration token.
 *
 * @public
 */
async function getToken(messaging, options) {
    messaging = (0,_firebase_util__WEBPACK_IMPORTED_MODULE_2__.getModularInstance)(messaging);
    return getToken$1(messaging, options);
}
/**
 * Deletes the registration token associated with this {@link Messaging} instance and unsubscribes
 * the {@link Messaging} instance from the push subscription.
 *
 * @param messaging - The {@link Messaging} instance.
 *
 * @returns The promise resolves when the token has been successfully deleted.
 *
 * @public
 */
function deleteToken(messaging) {
    messaging = (0,_firebase_util__WEBPACK_IMPORTED_MODULE_2__.getModularInstance)(messaging);
    return deleteToken$1(messaging);
}
/**
 * When a push message is received and the user is currently on a page for your origin, the
 * message is passed to the page and an `onMessage()` event is dispatched with the payload of
 * the push message.
 *
 *
 * @param messaging - The {@link Messaging} instance.
 * @param nextOrObserver - This function, or observer object with `next` defined,
 *     is called when a message is received and the user is currently viewing your page.
 * @returns To stop listening for messages execute this returned function.
 *
 * @public
 */
function onMessage(messaging, nextOrObserver) {
    messaging = (0,_firebase_util__WEBPACK_IMPORTED_MODULE_2__.getModularInstance)(messaging);
    return onMessage$1(messaging, nextOrObserver);
}

/**
 * Firebase Cloud Messaging
 *
 * @packageDocumentation
 */
registerMessagingInWindow();


//# sourceMappingURL=index.esm2017.js.map


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/global */
/******/ 	(() => {
/******/ 		__webpack_require__.g = (function() {
/******/ 			if (typeof globalThis === 'object') return globalThis;
/******/ 			try {
/******/ 				return this || new Function('return this')();
/******/ 			} catch (e) {
/******/ 				if (typeof window === 'object') return window;
/******/ 			}
/******/ 		})();
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!**********************************!*\
  !*** ./resources/js/firebase.js ***!
  \**********************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var firebase_app__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! firebase/app */ "./node_modules/firebase/app/dist/index.esm.js");
/* harmony import */ var firebase_analytics__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! firebase/analytics */ "./node_modules/firebase/analytics/dist/index.esm.js");
/* harmony import */ var firebase_messaging__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! firebase/messaging */ "./node_modules/firebase/messaging/dist/index.esm.js");
// Import the functions you need from the SDKs you need


 // TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries
// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional

var firebaseConfig = {
  apiKey: "AIzaSyBczwu5YDKGF8o6CyESL5V8zRfuspoAJQM",
  authDomain: "gsg-test-d7f0f.firebaseapp.com",
  projectId: "gsg-test-d7f0f",
  storageBucket: "gsg-test-d7f0f.appspot.com",
  messagingSenderId: "477268149967",
  appId: "1:477268149967:web:a5158157512ce5e93b19ba",
  measurementId: "G-EYYM7VPYMG"
}; // Initialize Firebase

var app = (0,firebase_app__WEBPACK_IMPORTED_MODULE_0__.initializeApp)(firebaseConfig);
var analytics = (0,firebase_analytics__WEBPACK_IMPORTED_MODULE_1__.getAnalytics)(app); // Initialize Firebase Cloud Messaging and get a reference to the service

var messaging = (0,firebase_messaging__WEBPACK_IMPORTED_MODULE_2__.getMessaging)(app); // Get registration token. Initially this makes a network call, once retrieved
// subsequent calls to getToken will return from cache.

(0,firebase_messaging__WEBPACK_IMPORTED_MODULE_2__.getToken)(messaging, {
  vapidKey: 'BPW-kaICcgmVt_KpJ3igTUznhFIaXwuDTP1E1IRcbTHHUlCsyzPDzT5NjwAlSEdr36QlGT-ubcyTpuqLR_CILuI'
}).then(function (currentToken) {
  if (currentToken) {
    // Send the token to your server and update the UI if necessary
    console.log(currentToken);
  } else {
    // Show permission request UI
    console.log('No registration token available. Request permission to generate one.'); // ...
  }
})["catch"](function (err) {
  console.log('An error occurred while retrieving token. ', err); // ...
});
(0,firebase_messaging__WEBPACK_IMPORTED_MODULE_2__.onMessage)(messaging, function (payload) {
  console.log('Message received. ', payload); // ...
});
})();

/******/ })()
;